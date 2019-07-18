<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth:admins')->only('index');
    // }
    public function index()
    {

        $data['countbill'] = DB::table('carts')->where('status', 0)->count();
        $data['countproducts'] = DB::table('products')->count();
        $data['countusers'] = DB::table('users')->where('status', 1)->count();
        $data['countcontacts'] = DB::table('contacts')->where('status', 0)->count();
        $data['contacts'] = DB::table('contacts')->where('status', 0)->get();
        return view('admincp.home', $data);
    }
}
