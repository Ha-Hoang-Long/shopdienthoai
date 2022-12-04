<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    //
    public function index(){
        if(Session::has("Cart") == null){
            
            return route::Redirect('fe.list_cart');
        }
        $all_customer = DB::table('customers')->select('Customers.*')->get();

        return view('FE.check_out',[
            'all_customer' => $all_customer,
        ]);
    }

    public function add_customer(Request $request){
        $result = array();
        $result['fullname'] = $request->fullname;
        $result['email'] = $request->email;
        $result['phone_number'] = $request->phone_number;
        $result['province'] = $request->province;
        $result['District'] = $request->District;
        $result['commune'] = $request->commune;
        $result['apartment_number'] = $request->apartment_number;
        
        $customer = DB::table('customers')->select('Customers.*')
        ->where('customers.fullname',$request->fullname)
        ->where('customers.email',$request->email)
        ->where('customers.phone_number',$request->phone_number)
        ->where('customers.province',$request->province)
        ->where('customers.District',$request->District)
        ->where('customers.commune',$request->commune)
        ->where('customers.apartment_number',$request->apartment_number)->first();
        if($customer == null){
            $shipping_id = DB::table('customers')->insertGetId($result);
            Session::put('note',$request->note);
            // dd(Session::get('note'));
            Session::put('shipping_id',$shipping_id);
            // dd(Session::get('shipping_id'));
            return redirect()->route('checkout.payment');
            
        }
        Session::put('note',$request->note);
        Session::put('shipping_id',$customer->id);
        // dd(Session::get('shipping_id'));
        return redirect()->route('checkout.payment');
    }

    public function payment(){
        return view('fe.payment');
    }
    

    public function order_place(Request $request){
        $data  = array();
        $data['customer_id'] = Session::get('shipping_id');
        $data['note'] = Session::get('note');
        $data['order_status']   = 'Đang chờ xử lý';
        $data['total_price'] = Session::get("Cart")->totalPrice + 150000;
        $data['payment_option'] = $request->payment_option;
        // dd($request->payment_option);

        $order_id = DB::table('orders')->insertGetId($data);

        foreach(Session::get("Cart")->products as $product){
            $ord_d_data = array();
            $ord_d_data['order_id'] = $order_id;
            $ord_d_data['Ma_sp'] = $product['productInfo']->Ma_sp;
            $ord_d_data['Gia_tien'] = $product['productInfo']->Gia_tien;
            $ord_d_data['product_sales_qty'] = $product['quantity'];
            $ord_d_data['total_price'] = $product['price'];

            DB::table('order_details')->insert($ord_d_data);
        }

        // Session::get("Cart")::destroy();
        $request->session()->forget('Cart');
        $request->session()->forget('shipping_id');
        $request->session()->forget('note');
        Session::put('order_id',$order_id);

        return redirect()->route('fe.home');


    }

    public function checkout_notifi(){
        if(Session::has("order_id") == null){
            return back()->withInput();
        }
        $category_products = DB::table('category_products')
        ->select('category_products.*')->get();
        $order_detail = DB::table('order_details')
        ->join('products', 'order_details.Ma_sp','=','products.Ma_sp')
        ->select('order_details.*','products.*')
        ->where('order_details.order_id',Session::get('order_id'))->get();
        Session()->forget('order_id');
        return view('FE.checkout_notifi',[
            'order_detail' => $order_detail,
            'category_products' => $category_products
        ]);
    }

    // public function 


}
