<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fileupload extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'created', 'purpose', 'size', 'type', 'url'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'created'];

    protected $stripeFileds = ['uuid', 'created', 'purpose', 'size', 'type', 'url'];

    protected $jsonFileds = [];

    protected $fieldsConnection = ['uuid' => 'id'];

}
