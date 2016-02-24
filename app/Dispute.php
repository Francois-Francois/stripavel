<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispute extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'amount', 'balance_transactions_obj', 'balance_transactions_id', 'charge_id', 'created', 'currency', 'evidence', 'evidence_details', 'is_charge_refundable', 'metadata', 'reason', 'status'];

    protected $dates = ['created_at', 'updated_at', 'created', 'deleted_at'];

    static $stripeFields = ['uuid', 'amount', 'balance_transactions_obj', 'charge_id', 'created', 'currency', 'evidence', 'evidence_details', 'is_charge_refundable', 'metadata', 'reason', 'status'];

    static $jsonFields = ['balance_transactions_obj', 'evidence', 'evidence_details', 'metadata'];

    static $fieldsConnection = ['uuid' => 'id', 'balance_transactions_obj' => 'balance_transactions', 'charge_id' => 'charge'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function balanceTransaction()
    {
        return $this->belongsTo('App\BalanceTransaction', 'balance_transaction_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function charge()
    {
        return $this->belongsTo('App\Charge', 'charge_id', 'uuid');
    }
}
