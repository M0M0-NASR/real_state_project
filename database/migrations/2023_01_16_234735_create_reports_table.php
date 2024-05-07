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
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('Report_ID');
            $table->unsignedBigInteger('Reporter_ID');
            $table->unsignedBigInteger('Reported_ID');
            $table->String('Reason',255);
            $table->String('Description',300);
            $table->date('Report_Date');
            $table->foreign('Reporter_ID')->references('id')->on('user_infos')->onDelete('cascade');
            $table->foreign('Reported_ID')->references('id')->on('user_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
