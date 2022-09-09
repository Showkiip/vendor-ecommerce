<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('orderSales_id');
            $table->integer('accessory_id');
            $table->string('brand_name');
            $table->string('model_name');
            $table->string('category');
            $table->string('name');
            $table->string('quantity');
            $table->string('payment_status');
            $table->string('price');
            $table->string('grand_price');
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
        Schema::dropIfExists('accessory_orders');
    }
}
