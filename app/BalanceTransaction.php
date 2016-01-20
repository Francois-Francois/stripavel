<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BalanceTransaction extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'amount', 'currency', 'description', 'fee', 'fee_details', 'net', 'charge_id', 'sourced_transfers', 'status', 'type'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    static $stripeFields = ['uuid', 'amount', 'currency', 'description', 'fee', 'fee_details', 'net', 'charge_id', 'sourced_transfers', 'status', 'type'];

    static $jsonFields = ['available', 'pending'];

    static $fieldsConnection = ['uuid' => 'id', 'charge_id' => 'charge'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function charges()
    {
        return $this->hasMany('App\Charge', 'uuid', 'charge_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function refunds()
    {
        return $this->hasMany('App\Refund', 'balance_transaction_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reversals()
    {
        return $this->hasMany('App\Reversal', 'balance_transaction_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disputes()
    {
        return $this->hasMany('App\Dispute', 'balance_transaction_id', 'uuid');
    }

}

