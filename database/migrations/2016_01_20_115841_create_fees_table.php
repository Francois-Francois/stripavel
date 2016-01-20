<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->string('account_id');
            $table->integer('amount');
            $table->integer('amount_refunded')->default(0);
            $table->string('application_id')->nullable();
            $table->string('balance_transaction_id');
            $table->string('charge_id');
            $table->timestamp('created');
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->string('originating_transaction_id')->nullable();
            $table->boolean('refunded')->default(false);
            $table->json('refunds')->nullable();
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
        Schema::drop('fees');
    }
}
