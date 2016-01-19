<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankaccounts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->string('account_id')->nullable();
            $table->string('bank_name');
            $table->string('country');
            $table->enum('currency', ['usd', 'gbp', 'eur'])->nullable();
            $table->boolean('default_for_currency')->default(false);
            $table->string('fingerprint');
            $table->string('last4');
            $table->json('metadata')->nullable();
            $table->string('name');
            $table->string('routing_number');
            $table->enum('status', ['new', 'verified', 'validated', 'errored']);
            $table->string('usage')->nullable();
            $table->string('customer_reference')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_zip')->nullable();
            $table->string('customer_id')->nullable();
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
        Schema::drop('bankaccounts');
    }
}
