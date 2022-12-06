<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    //
    public function index(Request $request, $modelName){
        $adminUser = Auth::guard('admin')->user();
        $model = '\App\Models\\'.ucfirst($modelName);
        $model = new $model;
        $configs = $model->listingConfigs();
        $title = $model->title;
        $records = $model::paginate(3);
        // $data = $model::paginate(1);
        if ($modelName == 'Product'){
            // $sinhvien = DB::table('sinhvien')
            // ->join('lophocs', 'lophocs.ma_lop', '=', 'sinhvien.ma_lop')
            // // ->join('orders', 'users.id', '=', 'orders.user_id')
            // ->select('sinhvien.*', 'lophocs.ten_lop')
            // ->paginate(3);
            // $data = $model->getSinhvien();
            $all_Product = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')->select('products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')->paginate(10);
            // echo '<pre>';
            // print_r($all_Product);
            // echo '</pre>';
            // $manager_product = view('admin.all_Product')->with('all_Product',$all_Product);
            // return view('Admin_layout')->with('admin.all_Product',$manager_product);
            return view('BE.admin.list.listing_product', [
                'table_name' => 'Danh sách sản phẩm',
                'model' => $modelName,
                'user' => $adminUser,
                // 'records' => $records,
                'Configs' => $configs,
                // 'all_Product' => $all_Product,
                'data' => $all_Product,
                'title' => $title
            ]);
        }
        if ($modelName == 'categoryProduct'){
            $result = DB::table('category_products')
            // ->join('lophocs', 'lophocs.ma_lop', '=', 'sinhvien.ma_lop')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('category_products.*')
            ->paginate(2);
            $records = $model::paginate(3);
            // print_r($result);
            
            // print_r($records);
            // $data = $model->getSinhvien();
            return view('BE.admin.list.listing_categoryproduct', [
                'table_name' => 'Danh sách danh mục sản phẩm',
                // 'model' => $modelName,
                'user' => $adminUser,
                'records' => $records,
                'Configs' => $configs,
                'data' => $result
            ]);
        }

        if ($modelName == 'brandProduct'){
            $result = DB::table('brand_products')
            // ->join('lophocs', 'lophocs.ma_lop', '=', 'sinhvien.ma_lop')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('brand_products.*')
            ->paginate(2);
            $records = $model::paginate(5);
            // $data = $model->getSinhvien();
            return view('BE.admin.list.listing_brandproduct', [
                'table_name' => 'Danh sách hãng sản phẩm',
                // 'model' => $modelName,
                'user' => $adminUser,
                'records' => $records,
                'Configs' => $configs,
                'data' => $result
            ]);
        }

        if($modelName == 'User'){
            $result = DB::table('users')
            ->select('users.*')->paginate(10);
            $records = $model::paginate(10);
            return view('BE.admin.list.listing_user', [
                'table_name' => 'Danh sách tài khoản người dùng',
                // 'model' => $modelName,
                'user' => $adminUser,
                'records' => $records,
                'Configs' => $configs,
                'data' => $result
            ]);
        }

        if($modelName == 'Order'){
            // $result = DB::table('orders')
            // ->select('orders.*')->paginate(10);
            $result = DB::table('orders')
            ->join('customers','orders.customer_id','=','customers.id')
            ->join('order_statuss','orders.order_status','=','order_statuss.id_status')
            // ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('orders.*','order_statuss.Name_status','customers.fullname','customers.email','customers.phone_number','customers.province','customers.District','customers.commune','customers.apartment_number')->paginate(10);
            $records = $model::paginate(10);
            $status_orde = DB::table('order_statuss')->select('order_statuss.*')->get(); 
            return view('BE.admin.list.listing_order', [
                'table_name' => 'Danh sách đơn hàng cmn mệt',
                // 'model' => $modelName,
                'user' => $adminUser,
                'records' => $records,
                'Configs' => $configs,
                'data' => $result,
                'status_order' => $status_orde
            ]);
        }

        // return view('admin.listing_khoa', [
        //     'model' => $modelName,
        //     'user' => $adminUser,
        //     'records' => $records,
        //     'Configs' => $configs,
        //     'data' => $data
        // ]);
    }
}
