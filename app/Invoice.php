<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'date', 'period_start', 'period_end', 'subtotal', 'total', 'customer_id', 'attempted', 'closed', 'forgiven', 'paid', 'livemode', 'attempt_count', 'description', 'discount_obj', 'metadata', 'discount_id', 'amount_due', 'lines', 'application_fee', 'currency', 'attempted', 'ending_balance', 'starting_balance', 'subscription_proration_date', 'closed', 'next_payment_attempt', 'webhooks_delivered_at', 'charge_id', 'subscription_id', 'tax_percent', 'tax', 'statement_descriptor', 'receipt_number'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date', 'period_end', 'period_start', 'webhooks_delivered_at', 'next_payment_attempt'];

    static $stripeFields = ['uuid', 'date', 'period_start', 'period_end', 'subtotal', 'total', 'customer_id', 'attempted', 'closed', 'forgiven', 'paid', 'livemode', 'attempt_count', 'description', 'discount_obj', 'metadata', 'discount_id', 'amount_due', 'lines', 'application_fee', 'currency', 'attempted', 'ending_balance', 'starting_balance', 'subscription_proration_date', 'closed', 'next_payment_attempt', 'webhooks_delivered_at', 'charge_id', 'subscription_id', 'tax_percent', 'tax', 'statement_descriptor', 'receipt_number'];

    static $jsonFields = ['discount_obj', 'lines', 'metadata'];

    static $fieldsConnection = ['uuid' => 'id', 'customer_id' => 'customer', 'discount_obj' => 'discount', 'charge_id' => 'charge', 'subscription_id' => 'subscription'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }

    public function discount()
    {
        return $this->belongsTo('App\Disount', 'discount_id', 'uuid');
    }

    public function charges()
    {
        return $this->hasMany('App\Charge', 'uuid', 'charge_id');
    }

    public function subscription()
    {
        return $this->belongsTo('App\subscription', 'subscription_id', 'uuid');
    }

    public function items()
    {
         return $this->hasMany('App\Invoiceitem', 'invoice_id', 'uuid');
    }

}
