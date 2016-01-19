<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'interval', 'plan_id', 'cancel_at_period_end', 'customer_id', 'plan_object', 'quantity', 'start', 'status', 'application_fee_percent', 'canceled_at', 'current_period_end','current_period_start','discount_id','discount_object','discount_id_on_creation','ended_at','metadata','trial_end','trial_start','tax_percent','start_at','active','start_date','first_renewal_date','end_date','animal_id','address_id'];

    protected $dates = ['start', "current_period_start", "current_period_end", "ended_at", "trial_start", "trial_end", "canceled_at", "start_at", "created_at", "updated_at", "deleted_at", 'start_date','first_renewal_date','end_date' ];

    protected $stripeFileds = ['uuid', 'interval', 'plan_id', 'cancel_at_period_end', 'customer_id', 'plan_obj', 'quantity', 'start', 'status', 'application_fee_percent', 'canceled_at', 'current_period_end','current_period_start', 'discount_obj','ended_at','metadata','trial_end','trial_start','tax_percent'];

    protected $jsonFileds = ['metadata', 'discount_obj', 'plan_obj'];

    protected $fieldsConnection = ['uuid' => 'id', 'customer_id' => 'customer', 'plan_id' => 'plan'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice', 'subscription_id', 'uuid');
    }

    public function plan()
    {
        return $this->belongsTo('App\Plan', 'plan_id', 'plan');
    }

}
