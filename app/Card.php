<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Card
 * @package App
 */
class Card extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'account',
        'address_city',
        'address_country',
        'address_line1',
        'address_line2',
        'address_state',
        'address_zip',
        'country',
        'address_line1_check',
        'address_zip_check',
        'cvc_check',
        'default_for_currency',
        'brand',
        'currency',
        'customer_id',
        'dynamic_last4',
        'last4',
        'exp_month',
        'exp_year',
        'metadata',
        'name',
        'recipient_id',
        'fingerprint',
        'funding'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'account',
        'address_city',
        'address_country',
        'address_line1',
        'address_line2',
        'address_state',
        'address_zip',
        'country',
        'address_line1_check',
        'address_zip_check',
        'cvc_check',
        'default_for_currency',
        'brand',
        'currency',
        'customer_id',
        'dynamic_last4',
        'last4',
        'exp_month',
        'exp_year',
        'metadata',
        'name',
        'recipient_id',
        'fingerprint',
        'funding'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['dispute', 'fraud_details', 'refunds', 'shipping', 'metadata'];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id', 'customer_id' => 'customer'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function charges()
    {
        return $this->hasMany('App\Charge', 'card_id', 'uuid');
    }
}
