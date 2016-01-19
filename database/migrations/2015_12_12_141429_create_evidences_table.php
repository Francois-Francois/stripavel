<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('access_activity_log');
            $table->string('billing_address');
            $table->string('cancellation_policy');
            $table->string('cancellation_policy_disclosure');
            $table->string('cancellation_rebuttal');
            $table->string('customer_communication');
            $table->string('customer_email_address');
            $table->string('customer_name');
            $table->string('customer_purchase_ip');
            $table->string('customer_signature');
            $table->string('duplicate_charge_documentation');
            $table->string('duplicate_charge_explanation');
            $table->string('duplicate_charge_id');
            $table->string('product_description');
            $table->string('receipt');
            $table->string('refund_policy');
            $table->string('refund_policy_disclosure');
            $table->string('refund_refusal_explanation');
            $table->string('service_date');
            $table->string('service_documentation');
            $table->string('shipping_address');
            $table->string('shipping_carrier');
            $table->string('shipping_date');
            $table->string('shipping_documentation');
            $table->string('shipping_tracking_number');
            $table->string('uncategorized_file');
            $table->string('uncategorized_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evidences');
    }
}
