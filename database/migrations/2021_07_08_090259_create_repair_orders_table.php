<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->integer('techId')->nullable();
            $table->integer('model_Id');
            $table->string('date');
            $table->integer('time_id');
            $table->string('name');
            $table->enum('pay_status', ['unpaid','paid']);
            $table->string('pay_method')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('instructions')->nullable();
            $table->enum('order_status', ['0','1','2','3','4'])->default('3');
            $table->enum('order_create', ['admin','customer'])->default('customer');
            $table->boolean('notification')->default(0);
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
        Schema::dropIfExists('repair_orders');
    }
}
