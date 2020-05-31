<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('tracking_number');
            $table->string('shipping_address');
            $table->string('phone_number');
            $table->integer('quantity');
            $table->integer('status')->default(1); //0 rejected 1 ordered 2 processing 3 shipped 4 delivederd
            $table->string('country');
            $table->string('payment_method'); //card cash
            $table->string('city');
            $table->string('zip')->nullable();
            $table->string('user_email');
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
        Schema::dropIfExists('orders');
    }
}
