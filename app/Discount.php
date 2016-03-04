<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discount
 * @package App
 */
class Discount extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'coupon_obj',
        'coupon_id',
        'customer_id',
        'start',
        'end',
        'subscription',
        'currency'
    ];

    /**
     * @var array
     */
    protected $dates = ['start', 'end', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'coupon_obj',
        'coupon_id',
        'customer_id',
        'start',
        'end',
        'subscription',
        'currency'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['coupon_obj'];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id', 'coupon_obj' => 'coupon', 'customer_id' => 'customer'];

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
