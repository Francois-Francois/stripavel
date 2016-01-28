<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->boolean('active')->default(false);
            $table->json('attributes')->nullable();
            $table->string('caption')->nullable();
            $table->timestamp('created');
            $table->string('description');
            $table->json('images')->nullable();
            $table->json('metadata')->nullable();
            $table->string('name');
            $table->json('package_dimensions')->nullable();
            $table->boolean('shippable')->default(false);
            $table->json('skus')->nulable();
            $table->timestamp('updated');
            $table->string('url')->nullable();
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
        Schema::drop('products');
    }
}
