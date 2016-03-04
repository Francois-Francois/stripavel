<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Invoiceitem
 * @package App
 */
class Invoiceitem extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'amount',
        'currency',
        'customer_id',
        'date',
        'description',
        'discountable',
        'invoice_id',
        'metadata',
        'period',
        'plan_object',
        'plan_id',
        'proration',
        'quantity',
        'subscription_id'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'deleted_at', 'updated_at', 'date'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'amount',
        'currency',
        'customer_id',
        'date',
        'description',
        'discountable',
        'invoice_id',
        'metadata',
        'period',
        'plan_obj',
        'plan_id',
        'proration',
        'quantity',
        'subscription_id'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['metadata', 'period', 'plan_obj'];

    /**
     * @var array
     */
    public static $fieldsConnection = [
        'uuid' => 'id',
        'customer_id' => 'customer',
        'invoice_id' => 'invoice',
        'plan_object' => 'plan',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'invoice_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo('App\Plan', 'plan_id', 'plan');
    }
}
