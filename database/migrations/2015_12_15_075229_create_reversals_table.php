<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReversalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reversals', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->integer('amount')->unsigned();
            $table->string('balance_transaction_id');
            $table->timestamp('created');
            $table->enum('currency', ['usd', 'gbp', 'eur']);
            $table->json('metadata')->nullable();
            $table->string('transfer_id');
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
        Schema::drop('reversals');
    }
}
