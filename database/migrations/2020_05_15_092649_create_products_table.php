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
            $table->string('name');
            $table->longText('description');
            // $table->longText('specificaton')->nullable();
            $table->string('image1'); //height 600 width 555
            $table->string('image2');
            $table->string('image3');
            $table->integer('category_id');
            $table->integer('status')->default(2); //0 out of stock 1 limited stock 2 in stock
            $table->integer('published')->default(1); //1 published 0 unplished
            $table->float('amount',8,2);
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
