<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid','name','statement_descriptor','trial_period_days','id_shop','amount','monthly_price','currency','currency_badge','interval','interval_count','metadata','type','short_name','more','is_root','giftable','created'];

    protected $dates = ['created', 'created_at', 'deleted_at', 'updated_at'];

    static $stripeFields = ['uuid', 'name', 'statement_descriptor','trial_period_days', 'amount', 'currency', 'currency_badge', 'interval','interval_count','metadata', 'more', 'created'];

    static $jsonFields = ['metadata'];

    static $fieldsConnection = ['uuid' => 'id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany('App\Subscription', 'plan_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'plan_id', 'uuid');
    }

}
