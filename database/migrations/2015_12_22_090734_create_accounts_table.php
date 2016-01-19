<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->string('business_name');
            $table->string('business_primary_color');
            $table->string('business_url');
            $table->boolean('charges_enabled');
            $table->string('country');
            $table->enum('currencies_supported', ['usd', 'gbp', 'eur']);
            $table->boolean('debit_negative_balances')->nullable();
            $table->json('decline_charge_on')->nullable();
            $table->json('external_accounts')->nullable();
            $table->json('legal_entity')->nullable();
            $table->boolean('managed')->nullable();
            $table->json('metadata')->nullable();
            $table->string('product_description')->nullable();
            $table->string('statement_descriptor');
            $table->string('support_email');
            $table->string('support_phone');
            $table->string('support_url');
            $table->string('timezone');
            $table->json('tos_acceptance')->nullable();
            $table->json('transfer_schedule')->nullable();
            $table->boolean('transfers_enabled');
            $table->json('verification')->nullable();
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
        Schema::drop('accounts');
    }
}
