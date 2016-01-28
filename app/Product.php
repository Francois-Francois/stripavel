<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'active', 'attributes', 'caption', 'created', 'description', 'images', 'metadata', 'name', 'package_dimensions', 'shippable', 'skus', 'updated', 'url'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'created', 'updated'];

    static $stripeFields = ['uuid', 'active', 'attributes', 'caption', 'created', 'description', 'images', 'metadata', 'name', 'package_dimensions', 'shippable', 'skus', 'updated', 'url'];

    static $jsonFields = ['attributes', 'images', 'metadata', 'package_dimensions', 'skus'];

    static $fieldsConnection = ['uuid' => 'id'];

}
