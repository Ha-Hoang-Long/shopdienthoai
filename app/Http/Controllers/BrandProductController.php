<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

class BrandProductController extends Controller
{
    //
    public function add_brandProduct(){
        $adminUser = Auth::guard('admin')->user();
    	return view('BE.admin.add_brandProduct',
        ['user'=>$adminUser]);
    }

    public function save_brandProduct(Request $request){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
    	$result['Ma_hang'] = $request->ma_hang;
    	$result['Ten_hang'] = $request->ten_hang;
    	$result['status_brand'] = $request->status_brand;


    	// echo '<pre>';
    	// print_r($result);
    	// echo '</pre>';
    	//DB::insert($result)->table('tbl_category_product');
    	DB::table('brand_products')->insert($result);
    	Session::put('massage','Thêm hãng thành công');
    	// return Redirect::to('add-brand-Product');
        return redirect()->route('listing.index',['model'=>'brandProduct'],);
    	// $result->save();
    	//return redirect()->action('add-category-Product');

    }

    public function unactive_brandProduct($Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('brand_products')->where('Ma_hang',$Ma_hang)->update(['status_brand'=>0]);
        DB::table('brand_products')->where('Ma_hang',$Ma_hang)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã ẩn hãng này');
    	return redirect()->route('listing.index',['model'=>'brandProduct'],);
    }
    public function active_brandProduct($Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('brand_products')->where('Ma_hang',$Ma_hang)->update(['status_brand'=>1]);
        DB::table('brand_products')->where('Ma_hang',$Ma_hang)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã hiển thị hãng này');
    	return redirect()->route('listing.index',['model'=>'brandProduct'],);
    }

    public function edit_brandProduct($Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	$edit_brandProduct = DB::table('brand_products')->where('Ma_hang',$Ma_hang)->get();
    	$manager_brand_product = view('BE.admin.edit_brandProduct',['user'=>$adminUser])->with('edit_brandProduct',$edit_brandProduct);
    	Session::put('massage','Lấy dữ liệu thành công');
    	return view('BE.layouts.admin',['user'=>$adminUser])->with('BE.admin.edit_brandProduct',$manager_brand_product);

    }
    public function update_brandProduct(Request $request,$Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
    	$result['Ten_hang'] = $request->input('ten_hang');
        // $result['Mo_ta_danh_muc'] = $request->input('mo_ta_danh_muc');
        $result['status_brand'] = $request->input('status_brand');
        $result['updated_at'] = Carbon::now();

    	DB::table('brand_products')->where('Ma_hang',$Ma_hang)->update($result);
        // DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Cập nhật hãng thành công');
    	return redirect()->route('listing.index',['model'=>'brandProduct']);	
    }
    public function delete_brandProduct($Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('brand_products')->where('Ma_hang',$Ma_hang)->delete();
    	Session::put('massage','Xóa hãng sản phẩm thành công');
    	return redirect()->route('listing.index',['model'=>'brandProduct']);
    }
}

