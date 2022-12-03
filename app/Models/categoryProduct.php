<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryProduct extends Base
{
    use HasFactory;

    public $title = "Danh mục";
    
    public function listingConfigs() {
        $defaultListtingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  array(
            array(
                'field' => 'Ma_danh_muc',
                'name' => 'Mã danh mục',
                'type' => 'string'
            ),
            array(
                'field' => 'Ten_danh_muc',
                'name' => 'Tên danh mục',
                'type' => 'string'
            ),
            array(
                'field' => 'Mo_ta_danh_muc',
                'name' => 'Mô tả danh mục',
                'type' => 'string'
            ),
            array(
                'field' => 'status_category',
                'name' => 'Trạng thái',
                'type' => 'number'
            ),
            array(
                'field' => 'Hinh_anh_category',
                'name' => 'Hình ảnh',
                'type' => 'string'
            ),
        );
        return array_merge($listingConfigs, $defaultListtingConfigs);
    }
}
