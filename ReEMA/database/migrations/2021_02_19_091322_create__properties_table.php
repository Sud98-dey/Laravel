<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('RegNo',20);    $table->string('HouseNo',10);
            $table->string('Society_Name',100); $table->string('Locality',50);
            $table->string('Landmark',50); $table->string('Area',30);
            $table->string('City',30); $table->string('Purpose',6);
            $table->string('Type',20); $table->integer('Size'); 
            $table->string('SubType',22); $table->mediumInteger('Price');
            $table->string('Status',7); $table->string('C_Status',12);
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
        Schema::dropIfExists('_properties');
    }
}
