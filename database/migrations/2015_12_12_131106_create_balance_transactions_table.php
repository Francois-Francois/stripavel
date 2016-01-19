<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->integer('amount')->unsigned();
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->string('description')->nullable();
            $table->integer('fee')->unsigned();
            $table->json('fee_details')->nullable();
            $table->integer('net')->unsigned();
            $table->string('charge_id');
            $table->json('sourced_transfers')->nullable();
            $table->enum('status', ['available', 'pending']);
            $table->enum('type', ['charge', 'refund', 'adjustment', 'application_fee', 'application_fee_refund', 'transfer', 'transfer_cancel', 'transfer_refund', 'transfer_failure']);
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
        Schema::drop('balance_transactions');
    }
}
