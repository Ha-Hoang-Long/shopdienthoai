<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public $title = "User";
    
    public function listingConfigs() {
        //$defaultListtingConfigs = parent::defaultListingConfigs();
        
        $listingConfigs =  array(
            array(
                'field' => 'id',
                'name' => 'Mã người dùng',
                'type' => 'string'
            ),
            array(
                'field' => 'name',
                'name' => 'Tên người dùng',
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
                'field' => 'updated_at',
                'name' => 'Ngày cập nhật',
                'type' => 'string'
            ),
            array(
                'field' => 'created_at',
                'name' => 'Ngày tạo',
                'type' => 'string'
            )
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
        return array_merge($listingConfigs);
    }
}
