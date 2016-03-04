<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * @package App
 */
class Account extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'business_name',
        'business_primary_color',
        'business_url',
        'charges_enabled',
        'country',
        'currencies_supported',
        'debit_negative_balances',
        'decline_charge_on',
        'external_accounts',
        'legal_entity',
        'managed',
        'metadata',
        'product_description',
        'statement_descriptor',
        'support_email',
        'support_phone',
        'support_url',
        'timezone',
        'tos_acceptance',
        'transfer_schedule',
        'transfers_enabled',
        'verification',
        'keys'
    ];

    /**
     * @var array
     */
    public static $stripeFields = [
        'uuid',
        'business_name',
        'business_primary_color',
        'business_url',
        'charges_enabled',
        'country',
        'currencies_supported',
        'debit_negative_balances',
        'decline_charge_on',
        'external_accounts',
        'legal_entity',
        'managed',
        'metadata',
        'product_description',
        'statement_descriptor',
        'support_email',
        'support_phone',
        'support_url',
        'timezone',
        'tos_acceptance',
        'transfer_schedule',
        'transfers_enabled',
        'verification'
    ];

    /**
     * @var array
     */
    public static $jsonFields = [
        'decline_charge_on',
        'external_accounts',
        'legal_entity',
        'metadata',
        'tos_acceptance',
        'transfer_schedule',
        'verification',
        'keys'
    ];

    /**
     * @var array
     */
    public static $fieldsConnection = ['uuid' => 'id'];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
