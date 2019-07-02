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
        return view('admincp.home');
    }
}
