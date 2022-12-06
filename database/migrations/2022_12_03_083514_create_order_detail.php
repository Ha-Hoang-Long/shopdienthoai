<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->Increments('order_details_id');
            $table->integer('order_id');
            $table->string('Ma_sp',20);
            // $table->string('Ten_sp',100);
            $table->string('Gia_tien');
            $table->integer('product_sales_qty');
            $table->string('total_price');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('order_id') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('id')->on('orders') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            
            // $table->timestamps();

            // $table->primary('order_detail_id');

            $table->foreign('Ma_sp') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('Ma_sp')->on('products') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
