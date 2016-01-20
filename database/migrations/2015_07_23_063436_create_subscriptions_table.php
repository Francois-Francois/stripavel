<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->string('interval')->nullable();
            $table->string('plan_id')->nullable();
            $table->boolean('cancel_at_period_end')->default(true);
            $table->string('customer_id');
            $table->json('plan_obj');
            $table->smallInteger('quantity')->default(1);
            $table->timestamp('start')->nullable();
            $table->enum('status', ['trialing', 'active', 'past_due', 'canceled', 'unpaid']);
            $table->decimal('application_fee_percent')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('current_period_end');
            $table->timestamp('current_period_start');
            $table->string('discount_id')->nullable();
            $table->json('discount_obj')->nullable();
            $table->string('discount_id_on_creation')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('trial_end')->nullable();
            $table->timestamp('trial_start')->nullable();
            $table->decimal('tax_percent')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->boolean('active')->default(true);
            $table->date('start_date')->nullable();
            $table->date('first_renewal_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('animal_id')->nullable();
            $table->integer('address_id')->nullable();
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
        Schema::drop('subscriptions');
    }
}
