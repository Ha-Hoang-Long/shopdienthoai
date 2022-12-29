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
    

     public function search(Request $request){
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
        // $category_products = DB::table('category_products')
        // ->select('category_products.*')->get();
        $brand_product = DB::table('brand_products')
        ->select('brand_products.*')->get();
        $data = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')->where('Ten_sp','like' ,'%'.$request->input('query').'%')
            ->where('status_product', 1)
            ->where('category_products.status_category',1)
            ->where('brand_products.status_brand',1)->get();
        $quaty = DB::table('products')->select('Ma_danh_muc',DB::raw('count(*) as total'))
        ->groupBy('Ma_danh_muc')
        ->get();
        if($data == null){
            // $data += "no";
        }
        return view('FE.search_result',[
            'category_products' => $category_products,
            'products' => $data,
            'brands' => $brand_product,
            'quaty' => $quaty,
        ]);
    }

    public function index()
    {
        
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
        // $products = DB::table('products')->where('status_product',1)->select('products.*')->get();
        $products = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')
            ->where('status_product',1)
            ->where('category_products.status_category',1)
            ->where('brand_products.status_brand',1)
            ->get();
        $brand = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('brand_products.Ten_hang','category_products.Ten_danh_muc')
            ->where('brand_products.status_brand',1)
            ->DISTINCT()->get();
    	return view('FE.wellcome',[
            'category_products' => $category_products,
            'products' => $products,
            'brand' => $brand
        ]);
    }
    public function wellcome(){
        // var_dump(Auth::user());
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
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
        foreach($product as $pro)
        $product_Related = DB::table('products')->select('products.*')->where('products.Ma_hang',$pro->Ma_hang)->where('products.status_product',1)->get();
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
        return view('FE.detail-product',
                [
                    'category_products' => $category_products,
                    'product'=>$product,
                    'product_Related'=>$product_Related]);
    }
    public function listing(Request $request, $modelName){
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
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
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')->select('products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')->where('category_products.Ten_danh_muc',$name)
            ->where('status_product',1)
            ->where('category_products.status_category',1)
            ->where('brand_products.status_brand',1)
            ->get();
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

    public function search_history_order(){
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
        return view('FE.search_history_order',[
            'category_products' => $category_products,
        ]);
    }

    public  function order_history(Request $request){
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
        $result = DB::table('orders')
            ->join('customers','orders.customer_id','=','customers.id')
            ->join('order_statuss','orders.order_status','=','order_statuss.id_status')
            // ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('orders.*','order_statuss.Name_status','customers.fullname','customers.email','customers.phone_number','customers.province','customers.District','customers.commune','customers.apartment_number')
            ->where('customers.phone_number',$request->phone)
            ->orderBy('updated_at','desc')->paginate(10);
        $order_detail = DB::table('order_details')->select('order_details.*','products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')
            ->join('products', 'order_details.Ma_sp ','=','products.Ma_sp')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->get();
        $status_orde = DB::table('order_statuss')->select('order_statuss.*')->get();
        if($result->count()==0){
            return redirect()->route('fe.search_history_order')->with('search-order', 'Số điện thoại không đúng!');
        }
        return view('FE.history_order',[
            'category_products' => $category_products,
            'data' => $result,
            'order_detail'=>$order_detail,
            'status_order' => $status_orde
        ]);
    }
}
