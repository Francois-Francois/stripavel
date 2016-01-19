<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->integer('amount')->unsigned();
            $table->timestamp('created');
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->string('balance_transaction_id')->nullable();
            $table->string('charge_id');
            $table->json('metadata')->nullable();
            $table->enum('reason', ['duplicate', 'fraudulent', 'requested_by_customer']);
            $table->string('receipt_number');
            $table->string('description')->nullable();
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
        Schema::drop('refunds');
    }
}
