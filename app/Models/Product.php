<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Base;

class Product extends Base
{
    use HasFactory;
    public $title = "Sản phẩm";
    
    public function listingConfigs() {
        $defaultListtingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  array(
            array(
                'field' => 'Ma_sp',
                'name' => 'Mã sản phẩm',
                'type' => 'string'
            ),
            array(
                'field' => 'Ten_sp',
                'name' => 'Tên sản phẩm',
                'type' => 'string'
            ),
            array(
                'field' => 'Ten_hang',
                'name' => 'Mã hãng',
                'type' => 'string'
            ),
            array(
                'field' => 'Ten_danh_muc',
                'name' => 'Mã danh mục',
                'type' => 'string'
            ),
            array(
                'field' => 'Ngay_ra_mat',
                'name' => 'Ngày ra mắt',
                'type' => 'string'
            ),
            
            // array(
            //     'field' => 'He_dieu_hanh',
            //     'name' => 'Hệ điều hành',
            //     'type' => 'string'
            // ),
            // array(
            //     'field' => 'CPU',
            //     'name' => 'CPU',
            //     'type' => 'string'
            // ),
            // array(
            //     'field' => 'GPU',
            //     'name' => 'GPU',
            //     'type' => 'string'
            // ),
            array(
                'field' => 'Gia_tien',
                'name' => 'Giá tiền',
                'type' => 'number'
            ),
            array(
                'field' => 'status_product',
                'name' => 'Trạng thái',
                'type' => 'number'
            ),
            array(
                'field' => 'Hinh_anh_product',
                'name' => 'Hình ảnh',
                'type' => 'image'
            ),

        );
        return array_merge($listingConfigs, $defaultListtingConfigs);
    }
}
