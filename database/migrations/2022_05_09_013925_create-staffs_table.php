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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('group');            //nhóm nhân viên
            $table->string('name');             //họ và tên
            $table->date('date_of_birth');      //ngày sinh
            $table->string('gender');           //giới tình
            $table->string('card')->unique();   //số cmnd
            $table->string('phone')->unique();  //Số điện thoại
            $table->string('email')->unique();  //email
            $table->string('address');          //địa chỉ   

            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
};
