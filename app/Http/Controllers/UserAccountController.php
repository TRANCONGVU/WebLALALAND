<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAccountController extends Controller
{
    //
    public function index(){
        $data['users'] = DB::table('users')->get();
        /*dd($data['users']);*/

        return view('admincp.account.users.list', $data);
    }
}
