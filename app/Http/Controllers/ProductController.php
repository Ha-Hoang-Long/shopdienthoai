<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

class ProductController extends Controller
{

    



    public function add_Product(){
        $adminUser = Auth::guard('admin')->user();
    	$cate_product = DB::table('category_products')->orderby('Ma_danh_muc','desc')->get();
    	$brand_product = DB::table('brand_products')->orderby('Ma_hang','desc')->get();
        
    	return view('BE.admin.add_Product',['user'=>$adminUser])->with('category_products',$cate_product)->with('brand_products',$brand_product);

    }

    public function save_Product(Request $request){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
        $result['Ma_sp'] = $request->Ma_sp;
    	$result['Ten_sp'] = $request->Ten_sp;
        $result['Ma_hang'] = $request->Ma_hang;
        $result['Ma_danh_muc'] = $request->Ma_danh_muc;
        $result['Ngay_ra_mat'] = $request->Ngay_ra_mat;
        $result['Man_hinh'] = $request->Man_hinh;
        $result['Mang'] = $request->Mang;
        $result['So_sim'] = $request->So_sim;
        $result['Bluetooth'] = $request->Bluetooth;
        $result['GPS'] = $request->GPS;
        $result['Cong_sac'] = $request->Cong_sac;
        $result['Jack_tai_nghe'] = $request->Jack_tai_nghe;
        $result['Cam_truoc'] = $request->Cam_truoc;
        $result['Cam_sau'] = $request->Cam_sau;
        $result['He_dieu_hanh'] = $request->He_dieu_hanh;
        $result['CPU'] = $request->CPU;
        $result['Toc_do_CPU'] = $request->Toc_do_CPU;
        $result['GPU'] = $request->GPU;
        $result['Pin'] = $request->Pin;
        $result['Ram'] = $request->Ram;
        $result['Rom'] = $request->Rom;
        $result['Rom_kha_dung'] = $request->Rom_kha_dung;
        $result['Thiet_ke'] = $request->Thiet_ke;
        $result['Trong_luong'] = $request->Trong_luong;
        $result['Gia_tien'] = $request->Gia_tien;
    	$result['status_product'] = $request->status_product;
        $get_image = $request->File('Hinh_anh_product');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/product_imgs',$new_image);
            $result['Hinh_anh_product'] = $new_image;

            DB::table('products')->insert($result);
            Session::put('massage','Thêm sản phẩm thành công');
            return redirect()->route('listing.index',['model'=>'Product'],); 
        }
        // $data['Hinh_anh_product'] = '';

    	// echo '<pre>';
    	// print_r($result);
    	// echo '</pre>';
    	//DB::insert($result)->table('tbl__product');
        // $result['Hinh_anh_product'] = $get_image;
    	DB::table('products')->insert($result);
    	Session::put('massage','Thêm sản phẩm thành công');
    	return redirect()->route('listing.index',['model'=>'Product'],);	
    	//$result->save();
    	//return redirect()->action('add--Product');

    }
    public function unactive_Product(Request $request,$Ma_sp){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('products')->where('Ma_sp',$Ma_sp)->update(['status_product'=>0]);
        DB::table('products')->where('Ma_sp',$Ma_sp)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã ẩn sản phẩm');
    	return redirect()->route('listing.index',['model'=>'Product']);
    }
    public function active_Product($Ma_sp){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('products')->where('Ma_sp',$Ma_sp)->update(['status_product'=>1]);
        DB::table('products')->where('Ma_sp',$Ma_sp)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã hiển thị sản phẩm');
    	return redirect()->route('listing.index',['model'=>'Product']);
    }
    public function delete_Product($Ma_sp){
        $adminUser = Auth::guard('admin')->user();
        $product = DB::table('products')->where('Ma_sp',$Ma_sp)->get();
        foreach ($product as $value){
            $Hinh_anh = $value->Hinh_anh_product;
        }
    	DB::table('products')->where('Ma_sp',$Ma_sp)->delete();
        if(\File::exists(public_path('uploads/product_imgs/'.$Hinh_anh))){
            \File::delete(public_path('uploads/product_imgs/'.$Hinh_anh));
            }
    	Session::put('massage','Xóa sản phẩm thành công');
    	return redirect()->route('listing.index',['model'=>'Product']);
        
    }
    public function edit_Product($Ma_sp){
        $adminUser = Auth::guard('admin')->user();
    	$edit_Product = DB::table('products')->where('Ma_sp',$Ma_sp)->get();
        $cate_product = DB::table('category_products')->orderby('Ma_danh_muc','desc')->get();
    	$brand_product = DB::table('brand_products')->orderby('Ma_hang','desc')->get();
    	$manager_product = view('BE.admin.edit_Product',['user'=>$adminUser])->with('edit_Product',$edit_Product)->with('category_products',$cate_product)->with('brand_products',$brand_product);
    	Session::put('massage','Lấy dữ liệu thành công');
    	return view('BE.layouts.admin',['user'=>$adminUser])->with('BE.admin.edit_Product',$manager_product);

    }
    public function update_Product(Request $request,$Ma_sp){
        $adminUser = Auth::guard('admin')->user();
        
        $result = array();
        $result['updated_at'] = Carbon::now();
        $result['Ma_sp'] = $request->Ma_sp;
    	$result['Ten_sp'] = $request->Ten_sp;
        $result['Ma_hang'] = $request->Ma_hang;
        $result['Ma_danh_muc'] = $request->Ma_danh_muc;
        $result['Ngay_ra_mat'] = $request->Ngay_ra_mat;
        $result['Man_hinh'] = $request->Man_hinh;
        $result['Mang'] = $request->Mang;
        $result['So_sim'] = $request->So_sim;
        $result['Bluetooth'] = $request->Bluetooth;
        $result['GPS'] = $request->GPS;
        $result['Cong_sac'] = $request->Cong_sac;
        $result['Jack_tai_nghe'] = $request->Jack_tai_nghe;
        $result['Cam_truoc'] = $request->Cam_truoc;
        $result['Cam_sau'] = $request->Cam_sau;
        $result['He_dieu_hanh'] = $request->He_dieu_hanh;
        $result['CPU'] = $request->CPU;
        $result['Toc_do_CPU'] = $request->Toc_do_CPU;
        $result['GPU'] = $request->GPU;
        $result['Pin'] = $request->Pin;
        $result['Ram'] = $request->Ram;
        $result['Rom'] = $request->Rom;
        $result['Rom_kha_dung'] = $request->Rom_kha_dung;
        $result['Thiet_ke'] = $request->Thiet_ke;
        $result['Trong_luong'] = $request->Trong_luong;
        $result['Gia_tien'] = $request->Gia_tien;
    	$result['status_product'] = $request->status_product;
        $get_image = $request->File('Hinh_anh_product');
        $product = DB::table('products')->where('Ma_sp',$Ma_sp)->get();
        foreach ($product as $value){
            $Hinh_anh = $value->Hinh_anh_product;
        }
        if($Hinh_anh == $get_image->getClientOriginalName()){
            $result['Hinh_anh_product'] = $get_image->getClientOriginalName();
            DB::table('products')->where('Ma_sp',$Ma_sp)->update($result);
            // DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update(['updated_at'=>Carbon::now()]);
            Session::put('massage','Cập nhật sản phẩm thành công');
            return redirect()->route('listing.index',['model'=>'Product']);
        }
        else {
            if($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('uploads/product_imgs',$new_image);
                $result['Hinh_anh_product'] = $new_image;
                print_r($result['status_product']);
                // DB::table('products')->insert($result);
                // Session::put('massage','Thêm sản phẩm thành công');
                // return redirect()->route('listing.index',['model'=>'Product'],); 
                DB::table('products')->where('Ma_sp',$Ma_sp)->update($result);
                // DB::table('category_products')->where('Ma_danh_muc',$Ma_danh_muc)->update(['updated_at'=>Carbon::now()]);
                Session::put('massage','Cập nhật sản phẩm thành công');
                return redirect()->route('listing.index',['model'=>'Product']);	
        }
        }
    		
    }


}