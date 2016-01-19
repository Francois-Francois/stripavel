<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->json('coupon_obj');
            $table->string('coupon_id');
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->string('customer_id')->nullable();
            $table->timestamp('start');
            $table->timestamp('end')->nullable();
            $table->string('subscription')->nullable();
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
        Schema::drop('discounts');
    }
}
