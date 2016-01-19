<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes, IsStripeEntity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'created', 'first_name', 'last_name', 'ip_address', 'account_balance', 'description', 'discount', 'metadata', 'shipping', 'default_source' ,'name', 'email', 'password', 'currency', 'delinquent', 'sources', 'subscriptions', 'last_four', 'year', 'month', 'fingerprint', 'confirmation_code'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $stripeFileds = ['uuid', 'created', 'account_balance', 'description', 'discount', 'metadata', 'shipping', 'default_source', 'email', 'currency', 'delinquent', 'sources', 'subscriptions'];

    protected $jsonFileds = ['discount', 'metadata', 'shipping', 'sources', 'subscriptions'];

    protected $fieldsConnection = ['uuid' => 'id'];

    public function addresses()
    {
        return $this->hasMany('App\Address', 'user_id');
    }

    public function subscriptions()
    {
        return $this->hasMany('App\Subscription', 'customer_id', 'uuid');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'customer_id', 'uuid');
    }

    public function invoicesItems()
    {
        return $this->hasMany('App\Invoiceitem', 'customer_id', 'uuid');
    }

    public function charges()
    {
        return $this->hasMany('App\Charge', 'customer_id', 'uuid');
    }

    public function creditCards()
    {
        return $this->hasMany('App\Card', 'customer_id', 'uuid');
    }

    public function cb()
    {
        return $this->hasOne('App\Card', 'default_source', 'uuid');
    }

    public function discounts()
    {
        return $this->hasMany('App\Discount', 'customer_id', 'uuid');
    }

    public function coupons()
    {
        return $this->hasMany('App\Coupon', 'user_id', 'id');
    }

    public function bankAccounts()
    {
        return $this->hasMany('App\Bankccount', 'customer_id', 'uuid');
    }
}
