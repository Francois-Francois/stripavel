<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->string('account')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_country')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_zip')->nullable();
            $table->string('country')->nullable();
            $table->enum('address_line1_check', ['pass', 'fail', 'unavailable', 'unchecked'])->nullable();
            $table->enum('address_zip_check', ['pass', 'fail', 'unavailable', 'unchecked'])->nullable();
            $table->enum('cvc_check', ['pass', 'fail', 'unavailable', 'unchecked'])->nullable();
            $table->boolean('default_for_currency')->nullable();
            $table->enum('brand', ['Visa', 'American Express', 'MasterCard', 'Discover', 'JCB', 'Diners Club', 'Unknown']);
            $table->enum('currency', ['usd', 'gbp', 'eur'])->nullable();
            $table->string('customer_id')->nullable();
            $table->string('dynamic_last4')->nullable();
            $table->integer('exp_month');
            $table->integer('exp_year');
            $table->string('last4');
            $table->string('fingerprint');
            $table->enum('funding', ['credit', 'prepaid', 'debit', 'unknown']);
            $table->json('metadata')->nullable();
            $table->string('name')->nullable();
            $table->string('recipient_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

       });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('cards');
    }
}
