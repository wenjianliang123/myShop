<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Model\User;
class Login extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function do_register(Request $request)
    {
        $data=$request->except(['_token']);
        $result=DB::table('shop_user')->insert($data);
        dd($result);
        if ($result){
            return redirect('/student/index');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function do_login(Request $request)
    {
//        die;
//        $data=$request->except(['_token']);
//        dd($data);
        $req = $request->all();

//        dd($req);
        $user_info = User::where(['user_name'=>$req['user_name'],'user_pwd'=>$req['user_pwd']])->first();
        //dd($user_info);
        //$user = $user_info->toArray();
        if(!empty($user_info)){
            //发放权限，写入session
            session(['user_name'=>$req['user_name']]);
            //$request->session()->put('name', $req['name']);
            //echo $request->session()->exists('name')."<br>";
//            dd($request->session()->exists('user_name'));//查询session有无该用户
            return redirect('/');
        }else{
            echo "这是数据库里面没有查询到该用户";
        }
    }

    public function login_out(Request $request){
        /*
         * forget 方法会从 Session 中删除指定数据，
         * 如果想从 Session 中删除所有数据，可以使用 flush 方法：
         * */
//        $request->session()->flush();//删除所有session
        $request->session()->forget('user_name');
        return redirect('/');
    }


}
