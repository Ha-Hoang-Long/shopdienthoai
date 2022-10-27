<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('Ma_sp',20);
            $table->string('Ten_sp',100);
            $table->string('Ma_hang',10);
            $table->string('Ma_danh_muc',10);
            $table->text('Ngay_ra_mat')->nullable();
            $table->string('Man_hinh')->nullable();
            $table->string('Mang')->nullable();
            $table->string('So_sim')->nullable();
            $table->string('Bluetooth')->nullable();
            $table->string('GPS')->nullable();
            $table->string('Cong_sac')->nullable();
            $table->string('Jack_tai_nghe')->nullable();
            $table->string('Cam_truoc')->nullable();
            $table->string('Cam_sau')->nullable();
            $table->string('He_dieu_hanh')->nullable();
            $table->string('CPU')->nullable();
            $table->string('Toc_do_CPU')->nullable();
            $table->string('GPU')->nullable();
            $table->string('Pin')->nullable();
            $table->string('Ram')->nullable();
            $table->string('Rom')->nullable();
            $table->string('Rom_kha_dung')->nullable();
            $table->string('Thiet_ke')->nullable();
            $table->string('Trong_luong')->nullable();
            $table->integer('Gia_tien')->nullable();
            $table->integer('status_product');
            $table->text('Hinh_anh_product');
            //$table->timestamps();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary(['Ma_sp']);
            $table->foreign('Ma_hang') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('Ma_hang')->on('brand_products') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('Ma_danh_muc') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('Ma_danh_muc')->on('category_products') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
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
        Schema::dropIfExists('products');
    }
}
