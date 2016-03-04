<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fee
 * @package App
 */
class Fee extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'account_id',
        'amount',
        'amount_refunded',
        'application_id',
        'balance_transaction_id',
        'charge_id',
        'created',
        'currency',
        'originating_transaction_id',
        'refunded',
        'refunds'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'created'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'account_id',
        'amount',
        'amount_refunded',
        'application_id',
        'balance_transaction_id',
        'charge_id',
        'created',
        'currency',
        'originating_transaction_id',
        'refunded',
        'refunds'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['refunds'];

    /**
     * @var array
     */
    public static $fieldsConnection = [
        'account_id' => 'account',
        'application_id' => 'application',
        'balance_transaction_id' => 'balance_transaction',
        'charge_id' => 'charge',
        'originating_transaction_id' => 'originating_transaction'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function charge()
    {
        return $this->belongsTo('App\Charge', 'charge_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo('App\BalanceTransaction', 'balance_transaction_id', 'uuid');
    }
}
