<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'active',
        'attributes',
        'caption',
        'created',
        'description',
        'images',
        'metadata',
        'name',
        'package_dimensions',
        'shippable',
        'skus',
        'updated',
        'url'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'created', 'updated'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'active',
        'attributes',
        'caption',
        'created',
        'description',
        'images',
        'metadata',
        'name',
        'package_dimensions',
        'shippable',
        'skus',
        'updated',
        'url'
    ];

    /**
     * @var array
     */
    public static $jsonFields = ['attributes', 'images', 'metadata', 'package_dimensions', 'skus'];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id'];
}
