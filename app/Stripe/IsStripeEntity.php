<?php

namespace App\Stripe;

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
        $entity = $this->where('uuid', $notification['id'])->first();

        if(!is_null($entity))
            return $entity->update($this->buildAttributesFromStripe($notification));

        return $this->create($this->buildAttributesFromStripe($notification));
    }

    /**
     * Update model from stripe notification after convertion
     * @param $notification
     *
     * @return mixed
     */
    public function updateFromStripe($notification)
    {
        return $this->update($this->buildAttributesFromStripe($notification));
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

}