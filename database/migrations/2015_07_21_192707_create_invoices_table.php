<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->timestamp('date');
            $table->timestamp('period_start');
            $table->timestamp('period_end');
            $table->integer('subtotal');
            $table->integer('total');
            $table->string('customer_id');
            $table->boolean('attempted')->default(false);
            $table->boolean('closed')->default(false);
            $table->boolean('forgiven')->default(false);
            $table->boolean('paid')->default(false);
            $table->boolean('livemode')->default(false);
            $table->smallInteger('attempt_count');
            $table->string('description')->nullable();
            $table->json('discount_obj')->nullable();
            $table->json('metadata')->nullable();
            $table->string('discount_id')->nullable();
            $table->integer('amount_due');
            $table->json('lines')->nullable();
            $table->integer('application_fee')->nullable();
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->integer('ending_balance')->nullable();
            $table->integer('starting_balance')->nullable();
            $table->integer('subscription_proration_date')->nullable();
            $table->timestamp('next_payment_attempt')->nullable();
            $table->timestamp('webhooks_delivered_at');
            $table->string('charge_id')->nullable();
            $table->string('subscription_id')->nullable();
            $table->smallInteger('tax_percent')->nullable();
            $table->integer('tax')->nullable();
            $table->string('statement_descriptor')->nullable();
            $table->string('receipt_number')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('invoices');
    }
}
