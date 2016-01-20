<?php

namespace App\Http\Controllers\Webhooks;

use App\Exceptions\EventClassNotAvailableException;
use App\Exceptions\StripeNotificationNotAvailableException;
use Illuminate\Support\Facades\Request;
use Stripe\Event as StripeEvent;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;

class StripeWebhooksController extends Controller
{

    /**
     * Handle a Stripe webhook call
     * @return array|null
     * @throws EventClassNotAvailableException
     * @throws StripeNotificationNotAvailableException
     */
    public function handleWebhook()
    {
        $payload = $this->getJsonPayload();

        if ($payload['livemode'] == true && ! $this->eventExistsOnStripe($payload['id'])) {
            throw new StripeNotificationNotAvailableException($payload['id'] . 'does not exists on Stripe');
        }

        $eventClass = 'App\Events\Stripe\\'.studly_case(str_replace('.', '_', $payload['type']));

        if (class_exists($eventClass)) {

            \App\Event::create($this->transformEvent($payload));

            $this->insertUpdatedData($payload);

            return event(new $eventClass($payload));
        } else {
            throw new EventClassNotAvailableException($eventClass . ' is not a valid class name');
        }
    }

    /**
     * Verify with Stripe that the event is genuine.
     *
     * @param  string  $id
     * @return bool
     */
    protected function eventExistsOnStripe($id)
    {
        try {
            return ! is_null(StripeEvent::retrieve($id, env('STRIPE_SECRET')));
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Get the JSON payload for the request.
     *
     * @return array
     */
    protected function getJsonPayload()
    {
        return (array) json_decode(Request::getContent(), true);
    }


    /**
     * Payload contains array, so we need to json_encode them
     * @param $payload
     *
     * @return array
     */
    protected function transformEvent($payload)
    {
        return [
            'uuid' => $payload['id'],
            'created' => $payload['created'],
            'livemode' => $payload['livemode'],
            'data' => json_encode($payload['data']),
            'pending_webhooks' => $payload['pending_webhooks'],
            'type' => $payload['type'],
            'api_version' => $payload['api_version'],
            'request' => $payload['request'],
        ];
    }

    /**
     * The payload will update the connected model/entity
     *
     * @param $payload
     */
    public function insertUpdatedData($payload)
    {
        $className = config('stripemodels.' . str_replace('.', '-', $payload['type']));

        if(!is_null($className))
        {
            $model = new $className;

            $model->createFromStripe($payload['data']['object']);
        }
    }
}
