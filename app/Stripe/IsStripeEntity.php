<?php

namespace App\Stripe;
use Illuminate\Database\Eloquent\Model;
use Stripe\StripeObject;

/**
 * Class IsStripeEntity
 * @package App\Traits
 */
trait IsStripeEntity
{

    /**
     * We need to know all fields changed from Stripe API
     * @param bool $revert
     *
     * @return array
     */
    public function getFieldsConnection($revert = false)
    {
        $connections = [];

        //loop on all database fields which belongs to stripe
        foreach (static::$stripeFields as $field) {
            /*
            | The goal is to return an array with transformed values
            | ex : ['uuid' => 'id']
            */
            if (array_key_exists($field, static::$fieldsConnection)) {
                $connections[$field] = static::$fieldsConnection[$field];
            } else {
                $connections[$field] = $field;
            }

        }

        return !$revert ? $connections : array_flip($connections);
    }


    /**
     * Create model from stripe notification after convertion
     * @param $notification
     *
     * @return mixed
     */
    public function createFromStripe($notification)
    {
        $entity = !isset($notification['data']['object']['id']) ? null : $this->where('uuid', $notification['data']['object']['id'])->first();

        if(!is_null($entity)) return $this->updateEntity($entity, $notification);

        return $this->create($this->buildAttributesFromStripe($notification['data']['object']));
    }

    /**
     * Update model from stripe notification after convertion
     * @param $notification
     *
     * @return mixed
     */
    public function updateFromStripe($notification)
    {
        return $this->update($this->buildAttributesFromStripe($notification['data']['object']));
    }

    /**
     * Stripe and database may have differents property names.
     * We need to make them matchs
     * Last part is a json cast to write in DB.
     *
     * @param $notification
     * @param $data
     *
     * @return mixed
     */
    public function buildAttributesFromStripe($notification)
    {

        foreach ($this->getFieldsConnection() as $key => $field)
        {
            //['uuid' => 'id']

            if (isset($notification[$field]) AND in_array($field, static::$fieldsConnection)) {
                $notification[$key] = $notification[$field];
                unset($notification[$field]);

            }
        }

        return $this->castJsonPropertyForDb($notification);
    }

    /**
     * All Stripe models should have a jsonFields property,
     * so we know when we need to json_encode the payload
     *
     * @param $data
     *
     * @return array
     */
    public function castJsonPropertyForDb($data)
    {
        $output = [];

        foreach($data as $key => $value)
        {
            $output[$key] = in_array($key, static::$jsonFields) ? json_encode($value) : $value;
        }

        return $output;
    }

    /**
     * Push new data or delete model when notification
     * contains .deleted
     * @param Model $entity
     * @param       $notification
     *
     * @return bool|int|null
     * @throws \Exception
     */
    public function updateEntity(Model $entity, $notification)
    {
        if(preg_match('/\.deleted/', $notification['type']))
            return $entity->delete();

        return $entity->update($this->buildAttributesFromStripe($notification['data']['object']));
    }

    /**
     * On all requests, Stripe's lib convert json in StripeObject instance.
     * You can now have response formatted like in documentation.
     *
     * @param StripeObject $object
     *
     * @return array
     */
    public function responseToArray(StripeObject $object)
    {
        $json = $object->__toJSON();

        return (array) json_decode($json, true);
    }

}