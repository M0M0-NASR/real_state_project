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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Customer_ID');
            $table->unsignedBigInteger('Seller_ID');
            $table->unsignedBigInteger('Property_ID');
            $table->double('Cash');
            $table->timestamps();
            $table->foreign('Customer_ID')->references('id')->on('user_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Seller_ID')->references('id')->on('user_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Property_ID')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
