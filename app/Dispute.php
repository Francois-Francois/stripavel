<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispute extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'amount', 'balance_transactions_obj', 'balance_transactions_id', 'charge_id', 'created', 'currency', 'evidence', 'evidence_details', 'is_charge_refundable', 'livemode', 'metadata', 'reason', 'status'];

    protected $dates = ['created_at', 'updated_at', 'created', 'deleted_at'];

    protected $stripeFileds = ['uuid', 'amount', 'balance_transactions_obj', 'charge_id', 'created', 'currency', 'evidence', 'evidence_details', 'is_charge_refundable', 'livemode', 'metadata', 'reason', 'status'];

    protected $jsonFileds = ['balance_transactions', 'evidence', 'evidence_details', 'metadata'];

    protected $fieldsConnection = ['uuid' => 'id', 'balance_transactions_obj' => 'balance_transactions', 'charge_id' => 'charge'];

    public function balanceTransaction()
    {
        return $this->belongsTo('App\BalanceTransaction', 'balance_transaction_id', 'uuid');
    }

    public function charge()
    {
        return $this->belongsTo('App\Charge', 'charge_id', 'uuid');
    }
}
