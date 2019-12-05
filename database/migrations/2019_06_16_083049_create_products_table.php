<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('id');
            $table->string('article');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->char('description', 255);
            $table->decimal('price', 12, 2);
            $table->string('width')->default(0);
            $table->string('height')->default(0);
            $table->boolean('status')->default(1);
            $table->string('author')->nullable();
            $table->boolean('auction')->default(0);
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('view_count')->default(0);
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
        Schema::dropIfExists('products');
    }
}
