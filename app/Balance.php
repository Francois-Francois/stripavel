<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Balance
 * @package App
 */
class Balance extends Model
{
    use SoftDeletes, IsStripeEntity;


    /**
     * @var array
     */
    protected $fillable = ['available', 'pending'];


    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    /**
     * @var array
     */
    public static $stripeFields = ['available', 'pending'];


    /**
     * @var array
     */
    public static $jsonFields = ['available', 'pending'];


    /**
     * @var array
     */
    public static $fieldsConnection = [];
}
