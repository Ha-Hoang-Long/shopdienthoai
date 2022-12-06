<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class AdminController extends Controller
{
    //
    public function index(){
    	return view('BE.admin.login');
    }

    public function account_verification(Request $request){
        // $pass = $request->password;
        // echo $pass;
        $credentials = $request->only('email','password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.show_dashboard');
        }
        else{
            return redirect()->route('admin.login');
        }
    }

    

    public function show_dashboard(){
        $adminUser = Auth::guard('admin')->user();
            return view('BE.admin.dashboard',['user'=>$adminUser]);
        
    }
    public function add_acount_user_form(){
        $adminUser = Auth::guard('admin')->user();
            return view('admin.add_acount_user',['user'=>$adminUser]);
        
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function update_status($order_id, $status){
        $adminUser = Auth::guard('admin')->user();
        DB::table('orders')->where('id',$order_id)->update(['order_status'=>$status]);
        DB::table('orders')->where('id',$order_id)->update(['updated_at'=>Carbon::now()]);
        return redirect()->route('listing.index',['model'=>'Order']);
    }
}
