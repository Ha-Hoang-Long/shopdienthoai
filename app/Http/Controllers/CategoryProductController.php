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

class CategoryProductController extends Controller
{
    //
    public function add_categoryProduct(){
        $adminUser = Auth::guard('admin')->user();
    	return view('BE.admin.add_categoryProduct',
        ['user'=>$adminUser]);
    }

    public function create_categoryProduct(Request $request){
        $adminUser = Auth::guard('admin')->user();
        $ma_danh_muc = $request->input('ma_danh_muc');
        $ten_danh_muc = $request->input('ten_danh_muc');
        $mo_ta_danh_muc = $request->input('mo_ta_danh_muc');
        $status_category = $request->input('status_category');

        DB::beginTransaction();
 
        try {
            DB::insert('insert into category_products (ma_danh_muc, ten_danh_muc, mo_ta_danh_muc, status_category) 
                        values (?, ?, ?, ?)', array($ma_danh_muc, $ten_danh_muc, $mo_ta_danh_muc, $status_category));
            DB::commit();
            Session::put('massage','Thêm danh mục sản phẩm thành công');
            // all good
        } catch (\Exception $e) {
            $mes = 'Thêm danh mục sản phẩm thất bại. Lỗi:'.' '.(string)$e->getMessage();
            Session::put('massage',$mes);
            DB::rollback();
            // $massage = $e->getMessage();
            // something went wrong
        }
        // DB::insert('insert into category_products (ma_danh_muc, ten_danh_muc, mo_ta_danh_muc, status_category) values (?, ?, ?, ?)', array($ma_danh_muc, $ten_danh_muc, $mo_ta_danh_muc, $status_category));
        
        return redirect()->route('listing.index',['model'=>'categoryProduct'],);
        
    }

    public function unactive_categoryProduct(Request $request,$Ma_danh_muc){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update(['status_category'=>0]);
        DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã ẩn danh mục');
    	return redirect()->route('listing.index',['model'=>'categoryProduct']);
    }
    public function active_categoryProduct($Ma_danh_muc){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update(['status_category'=>1]);
        DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã hiển thị danh mục');
    	return redirect()->route('listing.index',['model'=>'categoryProduct']);
    }
    public function edit_categoryProduct($Ma_danh_muc){
        $adminUser = Auth::guard('admin')->user();
    	$edit_categoryProduct = DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->get();
    	$manager_categogry_product = view('BE.admin.edit_categoryProduct',['user'=>$adminUser])->with('edit_categoryProduct',$edit_categoryProduct);
    	Session::put('massage','Lấy dữ liệu thành công');
    	return view('BE.layouts.admin',['user'=>$adminUser])->with('BE.admin.edit_categoryProduct',$manager_categogry_product);

    }
    public function update_categoryProduct(Request $request,$Ma_danh_muc){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
    	$result['Ten_danh_muc'] = $request->input('ten_danh_muc');
        $result['Mo_ta_danh_muc'] = $request->input('mo_ta_danh_muc');
        $result['status_category'] = $request->input('status_category');
        $result['updated_at'] = Carbon::now();

    	DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update($result);
        // DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Cập nhật danh mục thành công');
    	return redirect()->route('listing.index',['model'=>'categoryProduct']);	
    }
    public function delete_categoryProduct($Ma_danh_muc){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->delete();
    	Session::put('massage','Xóa danh mục sản phẩm thành công');
    	return redirect()->route('listing.index',['model'=>'categoryProduct']);
    }
}
