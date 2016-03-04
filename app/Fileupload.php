<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fileupload
 * @package App
 */
class Fileupload extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = ['uuid', 'created', 'purpose', 'size', 'type', 'url'];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'created'];

    /**
     * @var array
     */
    public static $stripeFields = ['uuid', 'created', 'purpose', 'size', 'type', 'url'];

    /**
     * @var array
     */
    public static $jsonFields = [];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id'];
}
