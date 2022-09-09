<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporaries', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->integer('orderId');
            $table->integer('techId')->nullable();
            $table->integer('model_Id');
            $table->string('date');
            $table->string('time');
            $table->string('name');
            $table->enum('pay_status', ['unpaid','paid']);
            $table->string('pay_method')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('reason');
            $table->enum('order_status', ['0','1','2','3'])->default('3');
            $table->enum('order_create', ['admin','customer'])->default('customer');
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
        Schema::dropIfExists('temporaries');
    }
}
