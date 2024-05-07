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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Rent_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('Property_ID');
            $table->date('Rent_date');
            $table->string('Rent_period',50);
            $table->double('cash');
            $table->foreign('user_id')->references('id')->on('user_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Property_ID')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rents');
    }
};
