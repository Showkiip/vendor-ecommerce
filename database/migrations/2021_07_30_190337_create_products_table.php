<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('category')->default('phone');
            $table->string('memory');
            $table->enum('locked', ['Locked', 'Unlocked'])->default('Unlocked');
            $table->string('warranty');
            $table->string('type');
            $table->string('desc');
            $table->string('screen_size');
            $table->string('screen_type');
            $table->string('megapixel');
            $table->enum('network', ['4', '2','3']);
            $table->enum('sim_card_format', ['nano', 'mini','micro']);
            $table->string('OS');
            $table->string('resolution');
            $table->enum('double_sim', ['Yes','No']);
            $table->date('release_year');
            $table->integer('model_id');
            $table->integer('service_id');

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
