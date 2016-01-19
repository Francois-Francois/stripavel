<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileuploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileuploads', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('uuid');
            $table->timestamp('created');
            $table->enum('purpose', ['identity_document', 'dispute_evidence', 'business_logo']);
            $table->integer('size');
            $table->enum('type', ['pdf', 'jpg', 'png']);
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
        Schema::drop('fileuploads');
    }
}
