<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    //
    public function index(){
        $data['bills'] = DB::table('carts')->orderBy('id', 'desc')->orderBy('status', 'asc')->get();

        return view('admincp.bill.list', $data);
    }
}
