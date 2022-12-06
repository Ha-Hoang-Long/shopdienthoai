<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('fullname');
            $table->string('email');
            $table->string('phone_number');
            $table->string('province');
            $table->string('District');
            $table->string('commune');
            $table->string('apartment_number');
            

            $table->timestamps();

            $table->foreign('user_id') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('id')->on('users') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
