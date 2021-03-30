<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('Fullname');
            $table->string('HouseNo',10);
            $table->string('Societyname',100);
            $table->string('Locality',50); $table->string('Landmark',50);
            $table->string('Area',50); $table->string('City',30);
            $table->date('UserDOB'); $table->string('Gender');
            $table->string('PhoneNo',20); $table->string('Role',10)->nullable();
            $table->string('email')->unique();
            $table->string('profile');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',12);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
