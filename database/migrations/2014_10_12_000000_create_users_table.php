<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid')->nullable();
            $table->timestamp('created')->nullable();
            $table->integer('account_balance')->default(0);
            $table->string('default_source')->nullable();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60)->nullable();
            $table->rememberToken();
            $table->string('ip_address')->nullable();
            $table->enum('currency', ['usd', 'gbp', 'eur'])->nullable();
            $table->boolean('delinquent')->default(false);
            $table->string('description')->nullable();
            $table->json('discount_obj')->nullable();
            $table->string('discount_id')->nullable();
            $table->boolean('livemode')->default(false);
            $table->json('metadata')->nullable();
            $table->json('shipping')->nullable();
            $table->json('sources')->nullable();
            $table->json('subscriptions_obj')->nullable();
            $table->smallInteger('last_four')->default(0);
            $table->smallInteger('year')->default(0);
            $table->tinyInteger('month')->default(0);
            $table->string('fingerprint')->default(0);
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
