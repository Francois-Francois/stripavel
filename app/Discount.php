<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'coupon_obj', 'coupon_id', 'customer_id', 'start', 'end', 'subscription', 'currency'];

    protected $dates = ['start', 'end', 'created_at', 'updated_at', 'deleted_at'];

    protected $stripeFileds = ['uuid', 'coupon_obj', 'coupon_id', 'customer_id', 'start', 'end', 'subscription', 'currency'];

    protected $jsonFileds = ['coupon_obj'];

    protected $fieldsConnection = ['uuid' => 'id', 'coupon_obj' => 'coupon', 'customer_id' => 'customer'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }

    public function invoice()
    {
        return $this->hasOne('App\Invoice', 'discount_id', 'uuid');
    }
}
