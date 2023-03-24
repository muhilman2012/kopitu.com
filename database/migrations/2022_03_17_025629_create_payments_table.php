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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment');
            $table->string('payment_type');
            $table->string('status');
            $table->integer('gross_amount');
            $table->string('bank')->nullable();
            $table->integer('va_number')->nullable();
            $table->date('date');
            $table->time('time');
            $table->date('deathline');
            $table->integer('invoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
