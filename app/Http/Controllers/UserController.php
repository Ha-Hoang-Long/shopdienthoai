<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_profile(){
        
        $user = DB::table('users')->select('users.*','customers.*')
        ->join('customers','users.id','=','customers.user_id')
        ->where('users.id',Auth::user()->id)->get();
        
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
        // dd($user);
        return view('FE.profile',[
            'category_products' => $category_products,
            'user' => $user,
        ]);
    }
    public function profile_edit($id){
        $user = DB::table('users')->select('users.*')->where('id', $id)->get();
        $cus = DB::table('customers')->select('customers.*')->where('customers.user_id',$id)->get();
        Session::put('user_id',$id);
        $category_products = DB::table('category_products')
        ->select('category_products.*')->where('category_products.status_category',1)->get();
        return view('FE.edit_profile',[
                        'category_products' => $category_products,
                        'customers' =>$cus,
                        'user'=>$user,
                    ]);
    }

    public function profile_save(Request $request){
        $cus_check = DB::table('customers')->select('customers.*')->where('customers.user_id',Session::get('user_id'))->first();
        // dd($cus_check);
        $used = array();
        $used['name'] = $request->fullname;
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
        if( $cus_check == null){
            if($customer == null){
                
                $result['user_id'] = Session::get('user_id');
                $shipping_id = DB::table('customers')->insertGetId($result);
                DB::table('users')->where('id',Session::get('user_id'))->update($used);
            }
            else{
                $ode_check = DB::table('orders')->select('orders.*')->where('orders.customer_id',$cus_check->id)->first();
                
                    $result['user_id'] = Session::get('user_id');
                    DB::table('customers')->where('id',$customer->id)->update($result);
                    DB::table('users')->where('id',Session::get('user_id'))->update($used);
            }
        }
        else{
            // dd($customer);
            $ode_check = DB::table('orders')->select('orders.*')->where('orders.customer_id',$cus_check->id)->first();
            if($customer == null){
                
                if($ode_check == null){
                    // dd($cus_check);
                    $result['user_id'] = Session::get('user_id');
                    DB::table('customers')->where('id',$cus_check->id)->update($result);
                    DB::table('users')->where('id',Session::get('user_id'))->update($used);
                    // return redirect()->route('user.profile');
                }
                else{
                    $cus_up = $cus_check;
                    $reup = array();
                    $reup['user_id'] = NULL;
                    $reup['fullname'] = $cus_up->fullname;
                    $reup['email'] = $cus_up->email;
                    $reup['phone_number'] = $cus_up->phone_number;
                    $reup['province'] = $cus_up->province;
                    $reup['District'] = $cus_up->District;
                    $reup['commune'] = $cus_up->commune;
                    $reup['apartment_number'] = $cus_up->apartment_number;

                    DB::table('customers')->where('id',$cus_check->id)->update($reup);
                    
                    $result['user_id'] = Session::get('user_id');
                    $shipping_id = DB::table('customers')->insertGetId($result);
                    DB::table('users')->where('id',Session::get('user_id'))->update($used);
                }
            }
            else{
                //  dd($cus_check);
                if($ode_check == null){
                    // dd($customer);
                    $result['user_id'] = Session::get('user_id');
                    DB::table('customers')->where('id',$customer->id)->update($result);
                    DB::table('users')->where('id',Session::get('user_id'))->update($used);
                    if($customer->id != $cus_check->id){
                        DB::table('customers')->where('id', $cus_check->id)->delete();
                    }
                    // return redirect()->route('user.profile');
                }
                else{
                    // dd($cus_check);
                    $result['user_id'] = Session::get('user_id');
                    DB::table('customers')->where('id',$customer->id)->update($result);
                    DB::table('users')->where('id',Session::get('user_id'))->update($used);
                }
            }
        }
        return redirect()->route('user.profile');
    }

    public function add_customer(Request $request,$id){
        $result = array();
        $result['user_id'] = $id;
        $result['fullname'] = $request->fullname;
        $result['email'] = $request->email;
        $result['phone_number'] = $request->phone_number;
        $result['province'] = $request->province;
        $result['District'] = $request->District;
        $result['commune'] = $request->commune;
        $result['apartment_number'] = $request->apartment_number;
        DB::table('customers')->insert($result);
        
        
        return redirect()->route('user.profile');
    }

    // public function index_user_table(){

    // }
}
