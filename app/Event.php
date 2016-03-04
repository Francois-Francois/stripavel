<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App
 */
class Event extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['uuid', 'created', 'livemode', 'data', 'pending_webhooks', 'type', 'api_version', 'request'];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'deleted_at', 'created', 'updated_at'];
}
