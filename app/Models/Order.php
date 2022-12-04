<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Base;

class Order extends Base
{
    use HasFactory;
    public $title = "O cmn der";

    public function listingConfigs() {
        $defaultListtingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  array(
            
            array(
                'field' => 'id',
                'name' => 'Mã đơn hàng',
                'type' => 'string'
            ),
            array(
                'field' => 'fullname',
                'name' => 'Tên khách hàng ',
                'type' => 'string'
            ),
            array(
                'field' => 'email',
                'name' => 'Email',
                'type' => 'string'
            ),
            array(
                'field' => 'phone_number',
                'name' => 'Số điện thoại',
                'type' => 'string'
            ),
            array(
                'field' => 'address',
                'name' => 'Địa chỉ',
                'type' => 'string'
            ),
            
            array(
                'field' => 'total_price',
                'name' => 'Tổng tiền',
                'type' => 'string'
            ),
            array(
                'field' => 'order_status',
                'name' => 'trạng thái đơn',
                'type' => 'string'
            ),
            // array(
            //     'field' => 'GPU',
            //     'name' => 'GPU',
            //     'type' => 'string'
            // ),
            // array(
            //     'field' => 'Gia_tien',
            //     'name' => 'Giá tiền',
            //     'type' => 'number'
            // ),
            // array(
            //     'field' => 'status_product',
            //     'name' => 'Trạng thái',
            //     'type' => 'number'
            // ),
            // array(
            //     'field' => 'Hinh_anh_product',
            //     'name' => 'Hình ảnh',
            //     'type' => 'image'
            // ),

        );
        return array_merge($listingConfigs, $defaultListtingConfigs);
    }
}
