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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id('id_shippings');
            $table->string('username');
            $table->string('phone');
            $table->string('province', 255);
            $table->string('city', 255);
            $table->text('address');
            $table->string('postal_code', 10);
            $table->string('expedition', 50);
            $table->string('service', 20);
            $table->integer('price');
            $table->string('estimation');
            $table->string('receipt', 25)->nullable();
            $table->integer('transaction_id');
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
        Schema::dropIfExists('shippings');
    }
};
