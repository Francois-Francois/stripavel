<?php

namespace App\Stripe;

use App\Coupon;

trait LookForCoupon
{
    /**
     * When a discount is added, or updated,
     * we need to look for the coupon to update entity
     */
    protected static function bootLookForCoupon()
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $payload = (array)json_decode($model->coupon_obj, true);
                if (!empty($payload)) {
                    return $model->couponNeedsUpdate($payload);
                }
            });
        }
    }

    /**
     * Update coupon model in DB
     * @param $payload
     */
    public function couponNeedsUpdate($payload)
    {
        $payload['data']['object'] = $payload;
        $payload['type'] = null;

        if (!is_null(Coupon::where('uuid', $payload['id'])->first())) {
            (new Coupon())->updateEntity(Coupon::where('uuid', $payload['id'])->first(), $payload);
        } else {
            Coupon::create((new Coupon())->buildAttributesFromStripe($payload));
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
            'created',
            'updated',
            'deleting'
        ];
    }
}
