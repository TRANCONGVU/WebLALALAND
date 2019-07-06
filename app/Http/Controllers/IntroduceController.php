<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    public function intro(){
        return view('admincp.introduce.introduce');
    }
}
