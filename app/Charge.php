<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Charge extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'livemode', 'paid', 'status', 'amount', 'currency', 'refunded', 'refunds', 'card_id', 'captured', 'balance_transaction_id', 'transfer_id', 'failure_message', 'failure_code', 'fraud_details', 'invoice_id', 'metadata', 'amount_refunded', 'customer_id', 'source', 'description', 'dispute', 'statement_descriptor', 'receipt_email', 'receipt_number', 'shipping', 'destination', 'application_fee'];

    protected $dates = ['created_at', 'deleted_at', 'updated_at'];

    static $stripeFields = ['uuid', 'livemode', 'paid', 'status', 'amount', 'currency', 'refunded', 'refunds', 'card_id', 'captured', 'balance_transaction_id', 'transfer_id', 'failure_message', 'failure_code', 'fraud_details', 'invoice_id', 'metadata', 'amount_refunded', 'customer_id', 'source', 'description', 'dispute', 'statement_descriptor', 'receipt_email', 'receipt_number', 'shipping', 'destination', 'application_fee'];

    static $jsonFields = ['dispute', 'fraud_details', 'metadata', 'refunds', 'shipping', 'source'];

    static $fieldsConnection = ['uuid' => 'id', 'customer_id', 'customer', 'account_id' => 'account', 'invoice_id' => 'invoice'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'invoice_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cb()
    {
        return $this->belongsTo('App\Card', 'card_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function balanceTransaction()
    {
        return $this->belongsTo('App\BalanceTransaction', 'balance_transaction_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transfer()
    {
        return $this->hasOne('App\Transfer', 'transfer_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disputes()
    {
        return $this->hasMany('App\Dispute', 'charge_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fee()
    {
        return $this->hasOne('App\Fee', 'uuid', 'charge_id');
    }

}
