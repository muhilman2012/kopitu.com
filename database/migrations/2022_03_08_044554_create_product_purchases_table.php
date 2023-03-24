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
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->id('id_product_purchases');
            $table->string('product_name');
            $table->text('slug');
            $table->string('category');
            $table->integer('weight');
            $table->integer('price');
            $table->text('description');
            $table->date('date');
            $table->integer('qty');
            $table->integer('total_price');
            $table->string('images');
            $table->integer('transaction_id');
            $table->integer('product_id');
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
        Schema::dropIfExists('product_purchases');
    }
};
