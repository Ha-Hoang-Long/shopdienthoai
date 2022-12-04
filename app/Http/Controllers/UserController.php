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

    // public function index_user_table(){

    // }
}
