<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['available', 'livemode', 'pending'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    static $stripeFields = ['available', 'livemode', 'pending'];

    static $jsonFields = ['available', 'pending'];

    static $fieldsConnection = [];
}