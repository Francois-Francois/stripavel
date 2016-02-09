<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use IsStripeEntity;

    protected $fillable = ['access_activity_log', 'billing_address', 'cancellation_policy', 'cancellation_policy_disclosure', 'cancellation_rebuttal', 'customer_communication', 'customer_email_address', 'customer_name', 'customer_purchase_ip', 'customer_signature', 'duplicate_charge_documentation', 'duplicate_charge_explanation', 'duplicate_charge_id', 'product_description', 'receipt', 'refund_policy', 'refund_policy_disclosure', 'refund_refusal_explanation', 'service_date', 'service_documentation', 'shipping_address', 'shipping_carrier', 'shipping_date', 'shipping_documentation', 'shipping_tracking_number', 'uncategorized_file', 'uncategorized_text'];

    static $stripeFields = ['access_activity_log', 'billing_address', 'cancellation_policy', 'cancellation_policy_disclosure', 'cancellation_rebuttal', 'customer_communication', 'customer_email_address', 'customer_name', 'customer_purchase_ip', 'customer_signature', 'duplicate_charge_documentation', 'duplicate_charge_explanation', 'duplicate_charge_id', 'product_description', 'receipt', 'refund_policy', 'refund_policy_disclosure', 'refund_refusal_explanation', 'service_date', 'service_documentation', 'shipping_address', 'shipping_carrier', 'shipping_date', 'shipping_documentation', 'shipping_tracking_number', 'uncategorized_file', 'uncategorized_text'];

    static $jsonFields = [];

    static $fieldsConnection = [];
}
