<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('orderSales_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('model_name')->nullable();
            $table->string('color')->nullable();
            $table->string('condition')->nullable();
            $table->string('storage')->nullable();
            $table->string('quantity')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('price')->nullable();
            $table->string('grand_price')->nullable();
            $table->enum('status',['1','2','3'])->nullable();

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
