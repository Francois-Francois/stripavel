<?php

namespace App\Stripe;


use App\Refund;

trait LookForRefunds
{

    /**
     * When a charge is added, of updated,
     * we need to look if refunds are related to store refunds data
     * in correct table
     */
    protected static function bootLookForRefunds()
    {

        foreach (static::getModelEvents() as $event) {

            static::$event(function ($model) use ($event) {

                $payload = (array) json_decode($model->refunds, true);

                if(!empty($payload)) return $model->refundsNeedaDatabase($payload['data']);

            });
        }
    }


    /**
     * Insert or update refunds models in DB
     * @param $payload
     */
    public function refundsNeedaDatabase($payload)
    {
        foreach ($payload as $refund) {
            $payload['data']['object'] = $refund; $payload['type'] = null;

            if (!is_null(Refund::where('uuid', $refund['id'])->first())) {

                (new Refund())->updateEntity(Refund::where('uuid', $refund['id'])->first(), $payload);

            } else {

                Refund::create((new Refund())->buildAttributesFromStripe($payload['data']['object']));

            }
        }
    }

    /**
     * Get the model events to record activity for.
     *
     * @return array
     */
    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return [
            'created', 'deleted', 'updated',
        ];
    }
}