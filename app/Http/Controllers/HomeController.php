<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $category_products = DB::table('category_products')
        ->select('category_products.*')->get();
        // $products = DB::table('products')->where('status_product',1)->select('products.*')->get();
        $products = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')->where('status_product',1)->get();
        $brand = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('brand_products.Ten_hang','category_products.Ten_danh_muc')->DISTINCT()->get();
    	return view('FE.wellcome',[
            'category_products' => $category_products,
            'products' => $products,
            'brand' => $brand
        ]);
    }
    public function wellcome(){
        // var_dump(Auth::user());
        $category_products = DB::table('category_products')
        ->select('category_products.*')->get();
        $products = DB::table('products')->where('status_product',0)->select('products.*');
    	return view('FE.wellcome',[
            'category_products' => $category_products,
            'products' => $products
        ]);
    }
    public function detail_product(Request $request,$Ma_sp){
        $product = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')->where('Ma_sp',$Ma_sp)->get();
        // $product = DB::table('products')->select('products.*')->where('Ma_sp',$Ma_sp)->get();
        $category_products = DB::table('category_products')
        ->select('category_products.*')->get();
        return view('FE.detail-product',
                [
                    'category_products' => $category_products,
                    'product'=>$product]);
    }
    public function listing(Request $request, $modelName){
        $category_products = DB::table('category_products')
        ->select('category_products.*')->get();
        $namemodel = $modelName;
        $namesplit = explode(" ", $namemodel);
        if($namesplit[0] == "danh" and $namesplit[1] == "mục"){
        //     print_r($namesplit[0]);
        // print_r($modelName);
            $i=2;
            $name="";
            While($i < count($namesplit)){
                $name .= $namesplit[$i] .= ' ';
                $i+=1; 
            }
            $name = trim($name);
            // print_r($name);
            $all_Product = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')->select('products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')->where('category_products.Ten_danh_muc',$name)->where('status_product',1)->get();
            return view('FE.listing',[
                        'products' =>$all_Product,
                        'category_products' => $category_products,
            ]);;
        }
        // if($modelName == 'dien-thoai'){
        //     $all_Product = DB::table('products')
        //     ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
        //     ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')->select('products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')->paginate(10);
        // }
        
        return view('FE.listing',[
            'category_products' => $category_products,
        ]);;
    }
}
