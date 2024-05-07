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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('PropertyStatus');
            $table->unsignedBigInteger('TypeID');
            $table->unsignedBigInteger('Publisher_id');
            $table->string('PublisherType');
            $table->string('Location');
            $table->string('Description');
            $table->unsignedBigInteger('Area');
            $table->unsignedBigInteger('Price');
            $table->integer('Bedrooms');
            $table->integer('Bathrooms');
            $table->string('Property_Image')->nullable();
            $table->string('Phone');
            $table->timestamps();
            $table->foreign('TypeID')->references('Type_ID')->on('types');
            $table->foreign('Publisher_id')->references('id')->on('user_infos')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
