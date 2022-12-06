<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('customer_id');
            $table->string('note');
            $table->integer('order_status');
            $table->string('total_price');
            $table->String('payment_option');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            
            // $table->primary(['order_id']);
            // $table->timestamps();
            $table->foreign('customer_id') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('id')->on('customers') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('order_status') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('id_status')->on('order_statuss') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
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
        Schema::dropIfExists('orders');
    }
}
