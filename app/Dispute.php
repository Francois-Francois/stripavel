<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dispute
 * @package App
 */
class Dispute extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'amount',
        'balance_transactions_obj',
        'balance_transactions_id',
        'charge_id',
        'created',
        'currency',
        'evidence',
        'evidence_details',
        'is_charge_refundable',
        'metadata',
        'reason',
        'status'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'created', 'deleted_at'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'amount',
        'balance_transactions_obj',
        'charge_id',
        'created',
        'currency',
        'evidence',
        'evidence_details',
        'is_charge_refundable',
        'metadata',
        'reason',
        'status'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['balance_transactions_obj', 'evidence', 'evidence_details', 'metadata'];

    /**
     * @var array
     */
    public static $fieldsConnection = [
        'uuid' => 'id',
        'balance_transactions_obj' => 'balance_transactions',
        'charge_id' => 'charge'
    ];

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
