<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->timestamp('created');
            $table->integer('percent_off')->nullable();
            $table->integer('amount_off')->nullable();
            $table->tinyInteger('duration_in_months')->nullable();
            $table->enum('duration', ['forever', 'once', 'repeating'])->nullable();
            $table->string('metadata')->nullable();
            $table->integer('max_redemptions')->nullable();
            $table->timestamp('redeem_by')->nullable();
            $table->integer('times_redeemed')->default(0);
            $table->boolean('valid')->default(1);
            $table->json('plans')->nullable();
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupons');
    }
}
