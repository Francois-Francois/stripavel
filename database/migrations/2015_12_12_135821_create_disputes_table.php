<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisputesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->integer('amount')->unsigned();
            $table->json('balance_transactions_obj')->nullable();
            $table->json('balance_transactions_id')->nullable();
            $table->string('charge_id');
            $table->timestamp('created');
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->json('evidence')->nullable();
            $table->json('evidence_details')->nullable();
            $table->boolean('is_charge_refundable')->default(false);
            $table->boolean('livemode')->default(false);
            $table->json('metadata')->nullable();
            $table->enum('reason', ['duplicate', 'fraudulent', 'subscription_canceled', 'product_unacceptable', 'product_not_received', 'unrecognized', 'credit_not_processed', 'incorrect_account_details', 'insufficient_funds', 'bank_cannot_process', 'debit_not_authorized', 'general']);
            $table->enum('status', ['warning_needs_response', 'warning_under_review', 'warning_closed', 'needs_response', 'response_disabled', 'under_review', 'charge_refunded', 'won', 'lost']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('disputes');
    }
}
