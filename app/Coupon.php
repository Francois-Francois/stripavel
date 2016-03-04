<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Coupon
 * @package App
 */
class Coupon extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'metadata',
        'plans',
        'created',
        'percent_of',
        'amount_off',
        'currency',
        'duration',
        'redeem_by',
        'max_redemptions',
        'times_redeem',
        'duration_in_months',
        'valid'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'created', 'redeem_by'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'metadata',
        'plans',
        'created',
        'percent_of',
        'amount_off',
        'currency',
        'duration',
        'redeem_by',
        'max_redemptions',
        'times_redeem',
        'duration_in_months',
        'valid'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['metadata'];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id'];
}



