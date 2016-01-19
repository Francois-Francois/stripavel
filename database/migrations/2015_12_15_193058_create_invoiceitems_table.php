<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->integer('amount');
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->string('customer_id')->nullable();
            $table->timestamp('date');
            $table->string('description')->nullable();
            $table->boolean('discountable');
            $table->string('invoice_id')->nullable();
            $table->json('metadata')->nullable();
            $table->json('period')->nullable();
            $table->json('plan_obj')->nullable();
            $table->string('plan_id')->nullable();
            $table->boolean('proration');
            $table->integer('quantity');
            $table->string('subscription_id')->nullable();
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
        Schema::drop('invoiceitems');
    }
}
