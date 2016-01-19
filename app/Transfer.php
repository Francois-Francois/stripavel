<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'amount', 'amount_reversed', 'application_fee', 'balance_transaction_id', 'created', 'currency', 'date', 'description', 'destination_id', 'destination_type', 'destination_payment_id', 'failure_code', 'failure_message', 'metadata', 'reversals'];

    protected $dates = ['date', 'created', 'created_at', 'updated_at', 'deleted_at'];

    protected $stripeFileds = ['uuid', 'amount', 'amount_reversed', 'application_fee', 'balance_transaction_id', 'created', 'currency', 'date', 'description', 'destination_id', 'destination_payment_id', 'failure_code', 'failure_message', 'metadata', 'reversals'];

    protected $jsonFileds = ['metadata', 'reversals'];

    protected $fieldsConnection = ['uuid' => 'id', 'balance_transaction_id' => 'balance_transaction', 'destination_id' => 'destination', 'destination_payment_id' => 'destination_payment'];

    public function balanceTransaction()
    {
        return $this->belongsTo('App\BalanceTransaction', 'balance_transaction_id', 'uuid');
    }

    public function reversals()
    {
        return $this->hasMany('App\Reversal', 'uuid', 'transfer_id');
    }

    public function destinationBankAccount()
    {
        return $this->belongsTo('App\BankAccount', 'destination_id', 'uuid');
    }

    public function charge()
    {
        $this->belongsTo('App\Charge', 'uuid', 'transfer_id');
    }
}
