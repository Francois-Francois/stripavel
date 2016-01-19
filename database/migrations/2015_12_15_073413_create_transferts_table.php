<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->integer('amount')->unsigned();
            $table->integer('amount_reversed')->unsigned();
            $table->string('application_fee')->nullable();
            $table->string('balance_transaction_id')->nullable();
            $table->timestamp('created');
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->timestamp('date');
            $table->string('description')->nullable();
            $table->string('destination_id');
            $table->string('destination_payment_id')->nullable();
            $table->enum('failure_code', ['insufficient_funds', 'account_closed', 'no_account', 'invalid_account_number', 'debit_not_authorized', 'bank_ownership_changed', 'account_frozen', 'could_not_process', 'bank_account_restricted', 'invalid_currency']);
            $table->string('failure_message')->nullable();
            $table->json('metadata')->nullable();
            $table->json('reversals')->nullable();
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
        Schema::drop('transfers');
    }
}
