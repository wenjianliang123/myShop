<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class goods_controller extends Controller
{
    public function add()
    {
        //redis缓存 通过访问一遍add页面 再去访问列表页面 来增加次数
        $redis= new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num=$redis->get('num');
        echo $num."<br/>";

        return view('goods_controller_add_goods');
    }
    public function do_add(Request $request)
    {
        //接收值
        $data=$request->except(['_token']);
//          file写字段名 store后面默认是storage/app/public 在config下filesystems.php下 修改
       /* 'local' => [
        'driver' => 'local',
            'root' => storage_path('app/public'),
        ],*/
//        $path="D:/"."wnmp/"."www/"."myShop/"."storage/"."app/"."public/".$request->file('goods_img')->store('/goods_img');
        //这里注意应该全都改为反斜杠
//        $path=str_replace('/','\\',$path);
        $path=$request->file('goods_img')->store('/goods_img');
//        dd($path);
        $path_url=asset('storage/'.$path);
        $data['goods_img']=$path_url;
//        dd($data);
//        dd($path_url);

//        echo asset('storage/'.$path);
//        dd($data);
//        dd($path);
        $time=date('Y-m-d H:i:s',time());

        $data['create_time']=$time;
        $res=DB::table('goods')->insert($data);
        if ($res)
        {
//            echo 111;
            return redirect('goods/index');
        }else{
            echo "no_add";
        }
    }

    public function index(Request $request)

    {
        $redis= new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
//        $data=DB::table('goods')->get();
        //dd($data);
        $req =$request->all();
//        dd($req);
        if (isset($req['goods_name'])){
            $goods_info=DB::table('goods')->where('goods_name','like','%'.$req['goods_name'].'%')->paginate(1);
        }else{
            $req['goods_name']="";
            $goods_info=DB::table('goods')->paginate(2);
        }

        $goods_infomation=$goods_info->toArray();
        $goods_infomation=json_encode($goods_infomation);
        $redis->set('goods_infomation',$goods_infomation,60);
        $num=$redis->get('num');
        echo "访问次数为".$num."次"."<br/>";

//        $aa=strtotime('9:00:00');
//        $bb=strtotime('17:00:00');
//        dd($bb);

        return view("/goods/goods_controller_index",['data'=>$goods_info,'goods_name'=>$req['goods_name']]);


    }

    public function del($id)
    {
        $res=DB::table('goods')->where('goods_id','=',$id)->delete();
//        dd($res);
        if ($res){
            return redirect('goods/index');
        }
    }

    public function edit($id)
    {
        $data=DB::table('goods')->where('goods_id','=',$id)->first();
//        dd($data);
        return view('/goods/edit',['data'=>$data]);
    }

    public function update(Request $request )
    {
        /*dd($data);*/
//        dd($data);

        $goods_id=$request->goods_id;
        $data=$request->except(['_token','goods_id']);
//        dd($data);
//        dd($data['goods_img']);
//        dd($request->file('goods_img'));
        if($request->file('goods_img')=='')
        {
            //$path="D:/"."wnmp/"."www/"."myShop/"."storage/"."app/"."public/".$request->file('goods_img')->store('/goods_img');
//        //这里注意应该全都改为反斜杠
//        $path=str_replace('/','\\',$path);
//        dd($path);
//            $path=$request->file('goods_img')->store('/goods_img');
//            $path_url=asset('storage/'.$path);
//            $data['goods_img']=$path_url;

//        dd($data);
            $res=DB::table('goods')->where(['goods_id'=>$goods_id])->update($data);
            if ($res){
                return redirect('/goods/index');
            }
        }else{
            $path=$request->file('goods_img')->store('/goods_img');
            $path_url=asset('storage/'.$path);
            $data['goods_img']=$path_url;

//        dd($data);
            $res=DB::table('goods')->where(['goods_id'=>$goods_id])->update($data);
            if ($res){
                return redirect('/goods/index');
            }
        }

//
    }

}
