<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    //
    
    function index(){
        $adminUser = Auth::guard('admin')->user();

        $images = \File::allFiles(public_path('uploads/product_imgs'));
         
        // return View('pages.form')->with(array('images'=>$images));
        $products = DB::table('products')->where('status_product',1)->select('products.Hinh_anh_product')->get();

        return view('BE.admin.list.listing_image',
        ['user'=>$adminUser,
        'products'=>$products
        ])->with(array('images'=>$images));
    }
}
