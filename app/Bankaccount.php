<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bankaccount
 * @package App
 */
class Bankaccount extends Model
{
    use SoftDeletes, IsStripeEntity;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'account_id',
        'bank_name',
        'country',
        'currency',
        'default_for_currency',
        'fingerprint',
        'last4',
        'metadata',
        'name',
        'routing_number',
        'status',
        'usage',
        'customer_reference',
        'address_line1',
        'address_city',
        'address_zip',
        'customer_id'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'deleted_at', 'updated_at'];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'account_id',
        'bank_name',
        'country',
        'currency',
        'default_for_currency',
        'fingerprint',
        'last4',
        'metadata',
        'name',
        'routing_number',
        'status',
        'usage',
        'customer_reference',
        'address_line1',
        'address_city',
        'address_zip',
        'customer_id'
    ];

    /**
     * @var array
     */
    public static $jsonFields = [];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id', 'customer_id' => 'customer', 'account_id' => 'account'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transfers()
    {
        return $this->hasMany('App\Transfer', 'destination_id', 'uuid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'uuid');
    }
}
