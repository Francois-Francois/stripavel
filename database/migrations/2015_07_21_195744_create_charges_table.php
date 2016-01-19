<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->boolean('livemode')->default(false);
            $table->boolean('paid')->default(false);
            $table->enum('status', ['succeeded', 'failed']);
            $table->integer('amount')->default(0);
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->boolean('refunded')->default(false);
            $table->json('refunds')->nullable();
            $table->string('card_id')->nullable();
            $table->boolean('captured')->default(false);
            $table->string('balance_transaction_id')->nullable();
            $table->string('transfer_id')->nullable();
            $table->string('failure_message')->nullable();
            $table->enum('failure_code', ['invalid_number', 'invalid_expiry_month', 'invalid_expiry_year', 'invalid_cvc', 'incorrect_number', 'expired_card', 'incorrect_cvc', 'incorrect_zip', 'card_declined', 'missing', 'processing_error'])->nullable();
            $table->json('fraud_details')->nullable();
            $table->string('invoice_id')->nullable();
            $table->json('metadata')->nullable();
            $table->integer('amount_refunded')->unsigned()->default(0);
            $table->string('customer_id')->nullable();
            $table->json('source');
            $table->string('description')->nullable();
            $table->json('dispute')->nullable();
            $table->string('statement_descriptor')->nullable();
            $table->string('receipt_email')->nullable();
            $table->string('receipt_number')->nullable();
            $table->json('shipping')->nullable();
            $table->string('destination')->nullable();
            $table->string('application_fee')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('charges');
    }
}
