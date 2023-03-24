<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('product_name');
            $table->text('slug');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->integer('stock');
            $table->integer('sold')->nullable();
            $table->integer('weight');
            $table->integer('price');
            $table->text('description');
            $table->date('date');
            $table->string('images');
            $table->integer('categories_id');
            $table->integer('categories_sub_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
