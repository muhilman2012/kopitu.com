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
        schema::create('users_address', function (Blueprint $table) {
            $table->id('id_address');
            $table->string('username');
            $table->string('label');
            $table->string('phone');
            $table->string('districts');
            $table->integer('postal_code');
            $table->text('address');
            $table->integer('province_id');
            $table->integer('city_id');
            $table->integer('users_id');
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
        Schema::dropIfExists('users_address');
    }
};
