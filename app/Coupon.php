<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'metadata', 'plans', 'created', 'percent_of', 'amount_off', 'currency', 'duration', 'redeem_by', 'max_redemptions', 'times_redeem', 'duration_in_months', 'valid'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'created', 'redeem_by'];

    static $stripeFields = ['uuid', 'metadata', 'plans', 'created', 'percent_of', 'amount_off', 'currency', 'duration', 'redeem_by', 'max_redemptions', 'times_redeem', 'duration_in_months', 'valid'];

    static $jsonFields = ['metadata'];

    static $fieldsConnection = ['uuid' => 'id'];

}



