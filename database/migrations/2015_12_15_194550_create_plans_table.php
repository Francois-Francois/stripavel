<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid')->unique();
            $table->string('name');
            $table->string('statement_descriptor')->nullable();
            $table->integer('trial_period_days')->nullable();
            $table->integer('id_shop')->unsigned();
            $table->integer('amount')->unsigned();
            $table->integer('monthly_price')->unsigned();
            $table->enum('currency', ['eur', 'gbp', 'usd']);
            $table->enum('currency_badge', ['€','CHF', '£', '$'])->default('€');
            $table->enum('interval', ['day', 'week', 'month', 'year', 'nor']);
            $table->smallInteger('interval_count')->unsigned();
            $table->json('metadata')->nullable();
            $table->enum('type', ['box', 'product'])->default('box');
            $table->string('short_name');
            $table->string('more')->nullable();
            $table->boolean('is_root')->default(false);
            $table->boolean('giftable')->default(false);
            $table->timestamp('created');
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
        Schema::drop('plans');
    }
}
