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
            $table->string('uuid')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_primary_color')->nullable();
            $table->string('business_url')->nullable();
            $table->boolean('charges_enabled')->default(false);
            $table->string('country')->nullable();
            $table->json('currencies_supported')->nullable();
            $table->boolean('debit_negative_balances')->nullable();
            $table->json('decline_charge_on')->nullable();
            $table->json('external_accounts')->nullable();
            $table->json('legal_entity')->nullable();
            $table->boolean('managed')->default(false);
            $table->json('metadata')->nullable();
            $table->string('product_description')->nullable();
            $table->string('statement_descriptor')->nullable();
            $table->string('support_email')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('support_url')->nullable();
            $table->string('timezone')->nullable();
            $table->json('tos_acceptance')->nullable();
            $table->json('transfer_schedule')->nullable();
            $table->boolean('transfers_enabled')->default(false);
            $table->json('verification')->nullable();
            $table->json('keys')->nullable();
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
