<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BalanceTransaction
 * @package App
 */
class BalanceTransaction extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'amount',
        'currency',
        'description',
        'fee',
        'fee_details',
        'net',
        'charge_id',
        'sourced_transfers',
        'status',
        'type'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'amount',
        'currency',
        'description',
        'fee',
        'fee_details',
        'net',
        'charge_id',
        'sourced_transfers',
        'status',
        'type'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['available', 'pending'];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id', 'charge_id' => 'charge'];

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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fee()
    {
        return $this->hasOne('App\Fee', 'uuid', 'balance_transaction_id');
    }
}
