<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Invoice
 * @package App
 */
class Invoice extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'date',
        'period_start',
        'period_end',
        'subtotal',
        'total',
        'customer_id',
        'attempted',
        'closed',
        'forgiven',
        'paid',
        'attempt_count',
        'description',
        'discount_obj',
        'metadata',
        'discount_id',
        'amount_due',
        'lines',
        'application_fee',
        'currency',
        'attempted',
        'ending_balance',
        'starting_balance',
        'subscription_proration_date',
        'closed',
        'next_payment_attempt',
        'webhooks_delivered_at',
        'charge_id',
        'subscription_id',
        'tax_percent',
        'tax',
        'statement_descriptor',
        'receipt_number'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date',
        'period_end',
        'period_start',
        'webhooks_delivered_at',
        'next_payment_attempt'
    ];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'date',
        'period_start',
        'period_end',
        'subtotal',
        'total',
        'customer_id',
        'attempted',
        'closed',
        'forgiven',
        'paid',
        'attempt_count',
        'description',
        'discount_obj',
        'metadata',
        'discount_id',
        'amount_due',
        'lines',
        'application_fee',
        'currency',
        'attempted',
        'ending_balance',
        'starting_balance',
        'subscription_proration_date',
        'closed',
        'next_payment_attempt',
        'webhooks_delivered_at',
        'charge_id',
        'subscription_id',
        'tax_percent',
        'tax',
        'statement_descriptor',
        'receipt_number'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['discount_obj', 'lines', 'metadata'];

    /**
     * @var array
     */
    public static $fieldsConnection = [
        'uuid' => 'id',
        'customer_id' => 'customer',
        'discount_obj' => 'discount',
        'charge_id' => 'charge',
        'subscription_id' => 'subscription'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function charges()
    {
        return $this->hasMany('App\Charge', 'uuid', 'charge_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo('App\subscription', 'subscription_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Invoiceitem', 'invoice_id', 'uuid');
    }
}
