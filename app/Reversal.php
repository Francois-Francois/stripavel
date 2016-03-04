<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reversal
 * @package App
 */
class Reversal extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'amount',
        'balance_transaction_id',
        'created',
        'currency',
        'metadata',
        'transfer_id'
    ];

    /**
     * @var array
     */
    protected $dates = ['created', 'created_at', 'deleted_at', 'updated_at'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'amount',
        'balance_transaction_id',
        'created',
        'currency',
        'metadata',
        'transfer_id'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['metadata'];

    /**
     * @var array
     */
    public static $fieldsConnection = [
        'uuid' => 'id',
        'balance_transaction_id' => 'balance_transaction',
        'transfer_id' => 'transfer'
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
    public function transfer()
    {
        return $this->belongsTo('App\Transfer', 'transfer_id', 'uuid');
    }
}
