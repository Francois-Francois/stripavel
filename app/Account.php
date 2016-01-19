<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['uuid', 'business_name', 'business_primary_color', 'business_url', 'charges_enabled', 'country', 'currencies_supported', 'debit_negative_balances', 'decline_charge_on', 'external_accounts', 'legal_entity', 'managed', 'metadata', 'product_description', 'statement_descriptor', 'support_email', 'support_phone', 'support_url', 'timezone', 'tos_acceptance', 'transfer_schedule', 'transfers_enabled', 'verification'];

    protected $stripeFileds = ['uuid', 'business_name', 'business_primary_color', 'business_url', 'charges_enabled', 'country', 'currencies_supported', 'debit_negative_balances', 'decline_charge_on', 'external_accounts', 'legal_entity', 'managed', 'metadata', 'product_description', 'statement_descriptor', 'support_email', 'support_phone', 'support_url', 'timezone', 'tos_acceptance', 'transfer_schedule', 'transfers_enabled', 'verification'];

    protected $jsonFileds = ['decline_charge_on', 'external_accounts', 'legal_entity', 'metadata', 'tos_acceptance', 'transfer_schedule', 'verification'];

    protected $fieldsConnection = ['uuid' => 'id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
