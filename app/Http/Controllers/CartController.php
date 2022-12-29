<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

class CartController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function add_cart(Request $req, $id){
        $products = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('products.*','brand_products.Ten_hang','category_products.Ten_danh_muc')->where('Ma_sp',$id)->get();
        // $product = DB::table('products')->select('products.*')->where('Ma_sp',$Ma_sp)->get();
        $category_products = DB::table('category_products')
        ->select('category_products.*')->get();
        $brand = DB::table('products')
            ->join('category_products','products.Ma_danh_muc','=','category_products.Ma_danh_muc')
            ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('brand_products.Ten_hang','category_products.Ten_danh_muc')->DISTINCT()->get();


        $produc = DB::table('products')->where('Ma_sp',$id)->first();
        if($produc){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            // $newCart = new Cart($oldCart);
            $newCart = new Cart($oldCart);
            $newCart->AddCart($produc,$id);
            $req->session()->put('Cart',$newCart);
            //  dd($newCart);
            // dd($product);
            // compact('newCart');
        }
        return redirect()->route('fe.detail',['Ma_sp'=>$id])->with(compact('newCart'));
        // return view('FE.wellcome',[
        //     'category_products' => $category_products,
        //     'products' => $products,
        //     'brand' => $brand
        // ],compact('newCart'));
    }

    function delete_ListItemcart(Request $request, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteitemCart($id);
        if(Count($newCart->products) > 0){
            $request->session()->put('Cart',$newCart);
        }
        else{
            $request->session()->forget('Cart');
        }
        return redirect()->route('fe.list_cart');
    }

    function save_itemcart(Request $request, $id,$quantity){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updatequantity_cart($id,$quantity);
        
        $request->session()->put('Cart',$newCart);
        
        return redirect()->route('fe.list_cart');
    }

    function list_cart(){
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
        return view('FE.show_cart',[
                'category_products' => $category_products]);
    }
}
