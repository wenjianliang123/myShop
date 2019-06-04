<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
//        for ($i=1;$i<10;$i++){
//            echo $i;
//            echo "<br />";
//        }
        return view('welcome');
    }
}
