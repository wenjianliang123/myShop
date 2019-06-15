<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public  function  index(){
//        die();
        echo "这是首页";
        echo "<br />";
        return view('index');
    }
}
