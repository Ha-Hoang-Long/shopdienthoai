<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandProduct extends Base
{
    use HasFactory;

    public $title = "Hãng";
    
    public function listingConfigs() {
        $defaultListtingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  array(
            array(
                'field' => 'Ma_hang',
                'name' => 'Mã hãng',
                'type' => 'string'
            ),
            array(
                'field' => 'Ten_hang',
                'name' => 'Tên hãng',
                'type' => 'string'
            ),
            array(
                'field' => 'status_brand',
                'name' => 'Trạng thái',
                'type' => 'number'
            ),
            array(
                'field' => 'Hinh_anh_brand',
                'name' => 'Hình ảnh',
                'type' => 'string'
            ),
        );
        return array_merge($listingConfigs, $defaultListtingConfigs);
    }
}
