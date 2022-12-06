<?php

namespace App\Http\Controllers;

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
        $category_products = DB::table('category_products')
        ->select('category_products.*')->get();
        return view('FE.profile',['category_products' => $category_products]);
    }
    public function profile_edit($id){
        $cus = DB::table('customers')->select('customers.*')->where('customers.user_id',$id)->get();
        $category_products = DB::table('category_products')
        ->select('category_products.*')->get();
        return view('FE.edit_profile',[
                        'category_products' => $category_products,
                        'customers' =>$cus,
                    ]);
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
