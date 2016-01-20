<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes, IsStripeEntity;


    protected $fillable = ['uuid', 'account', 'address_city', 'address_country', 'address_line1', 'address_line2', 'address_state', 'address_zip', 'country', 'address_line1_check', 'address_zip_check', 'cvc_check', 'default_for_currency', 'brand',  'currency', 'customer_id', 'dynamic_last4', 'last4', 'exp_month', 'exp_year', 'metadata', 'name', 'recipient_id', 'fingerprint', 'funding'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    static $stripeFields = ['uuid', 'account', 'address_city', 'address_country', 'address_line1', 'address_line2', 'address_state', 'address_zip', 'country', 'address_line1_check', 'address_zip_check', 'cvc_check', 'default_for_currency', 'brand',  'currency', 'customer_id', 'dynamic_last4', 'last4', 'exp_month', 'exp_year', 'metadata', 'name', 'recipient_id', 'fingerprint', 'funding'];

    static $jsonFields = ['dispute', 'fraud_details', 'refunds', 'shipping', 'metadata'];

    static $fieldsConnection = ['uuid' => 'id', 'customer_id' => 'customer'];

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
