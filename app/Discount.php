<?php

namespace App;

use App\Stripe\IsStripeEntity;
use App\Stripe\LookForCoupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discount
 * @package App
 */
class Discount extends Model
{
    use SoftDeletes, IsStripeEntity, LookForCoupon;

    /**
     * @var array
     */
    protected $fillable = [
        'coupon_obj',
        'customer_id',
        'start',
        'end',
        'subscription',
    ];

    /**
     * @var array
     */
    protected $dates = ['start', 'end', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'coupon_obj',
        'customer_id',
        'start',
        'end',
        'subscription',
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['coupon_obj'];

    /**
     * @var array
     */
    public static $fieldsConnection = ['coupon_obj' => 'coupon', 'customer_id' => 'customer'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }

}
