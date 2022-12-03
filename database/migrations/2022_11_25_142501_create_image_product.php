<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_products', function (Blueprint $table) {
            $table->id();
            $table->string('Ma_sp',20);
            $table->string('Ten_hinh_anh');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('Ma_sp') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('Ma_sp')->on('products') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
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
        Schema::dropIfExists('image_products');
    }
}
