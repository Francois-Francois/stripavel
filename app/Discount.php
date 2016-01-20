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

    static $stripeFields = ['uuid', 'coupon_obj', 'coupon_id', 'customer_id', 'start', 'end', 'subscription', 'currency'];

    static $jsonFields = ['coupon_obj'];

    static $fieldsConnection = ['uuid' => 'id', 'coupon_obj' => 'coupon', 'customer_id' => 'customer'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function invoice()
    {
        return $this->hasOne('App\Invoice', 'discount_id', 'uuid');
    }
}
