<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class goodsController extends Controller
{
    public function add_goods()
    {
        return view('goodsController_add_goods');
    }
    public function do_add_goods(Request $request)
    {
//        $path = $request->file('goods_source');
        $path = $request->file('goods_source')->store('/goods_source');

        dump($path);
        echo "<br />";
//        dd($path);
        echo asset('storage/'.$path);
//
    }
}
