<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bankaccount extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'account_id', 'bank_name', 'country', 'currency', 'default_for_currency', 'fingerprint', 'last4', 'metadata', 'name', 'routing_number', 'status', 'usage', 'customer_reference', 'address_line1', 'address_city', 'address_zip', 'customer_id'];

    protected $dates = ['created_at', 'deleted_at', 'updated_at'];

    protected $stripeFileds = ['uuid', 'account_id', 'bank_name', 'country', 'currency', 'default_for_currency', 'fingerprint', 'last4', 'metadata', 'name', 'routing_number', 'status', 'usage', 'customer_reference', 'address_line1', 'address_city', 'address_zip', 'customer_id'];

    protected $jsonFileds = [];

    protected $fieldsConnection = ['uuid' => 'id', 'customer_id', 'customer', 'account_id', 'account'];

    public function transfers()
    {
        return $this->hasMany('App\Transfer', 'destination_id', 'uuid');
    }

    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }
}
