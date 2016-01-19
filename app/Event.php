<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['uuid', 'created', 'livemode', 'data', 'pending_webhooks', 'type', 'api_version', 'request'];

    protected $dates = ['created_at', 'deleted_at', 'created', 'updated_at'];
}
