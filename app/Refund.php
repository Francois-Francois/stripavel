<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refund extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'amount', 'created', 'currency', 'balance_transaction_id', 'charge_id', 'metadata', 'reason', 'receipt_number', 'description'];

    protected $dates = ['created', 'created_at', 'updated_at', 'deleted_at'];

    protected $stripeFileds = ['uuid', 'amount', 'created', 'currency', 'balance_transaction_id', 'charge_id', 'metadata', 'reason', 'receipt_number', 'description'];

    protected $jsonFileds = ['metadata'];

    protected $fieldsConnection = ['uuid' => 'id', 'balance_transaction_id' => 'balance_transaction', 'charge_id' => 'charge'];

    public function balanceTransaction()
    {
        return $this->belongsTo('App\BalanceTransaction', 'balance_transaction_id', 'uuid');
    }

    public function charge()
    {
        return $this->belongsTo('App\Charge', 'charge_id', 'uuid');
    }
}
