<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Plan
 * @package App
 */
class Plan extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'statement_descriptor',
        'trial_period_days',
        'id_shop',
        'amount',
        'monthly_price',
        'currency',
        'currency_badge',
        'interval',
        'interval_count',
        'metadata',
        'type',
        'short_name',
        'more',
        'is_root',
        'giftable',
        'created'
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
        'name',
        'statement_descriptor',
        'trial_period_days',
        'amount',
        'currency',
        'currency_badge',
        'interval',
        'interval_count',
        'metadata',
        'more',
        'created'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['metadata'];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id'];

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
