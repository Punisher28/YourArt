<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('key');
            $table->string('name');
            $table->string('type');
            $table->string('size');
            $table->timestamps();
        });

        /////
        Schema::create('img_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('key');
            $table->string('name');
            $table->string('type');
            $table->string('size');
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
        Schema::dropIfExists('img_users');
        Schema::dropIfExists('img_products');

    }
}
