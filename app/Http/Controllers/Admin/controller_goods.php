<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//use Validator;

class controller_goods extends Controller
{
    public function add()
    {
        return view("goods_curd/goods_add");
    }

    public function do_add(Request $request)
    {
        $data=$request->all();

        $data=$request->except(['_token']);

        $path=$request->file('goods_pic')->store("goods_picture/0618");
//        dd($path);
        $path_url=asset('storage/'.$path);

        $data['goods_pic']=$path_url;

//        $time=date('Y-m-d H:i:s',time());

        $data['add_time']=time();

        //手动创建验证器
        $validator = \Validator::make($request->all(), [
            'goods_name' => 'required|unique:goods1|max:3',
            'goods_price' => 'required',
        ],[
            'goods_name.required' => '商品名称必填',
            'goods_price.required' => '商品价格必填',
            'goods_name.max' => '商品名称长度不符争取长度为3字符',
             'goods_name.unique' => '商品名称已存在'
        ]);

        if ($validator->fails()) {
            return redirect('goods_curd/add')
                ->withErrors($validator)
                ->withInput();
        }

        // Store the blog post...

        $res=DB::table("goods1")->insert($data);
        if ($res)
        {
//            echo 111;
            return redirect('goods_curd/index');
        }else{
            echo "no_add";
        }
        dd($data);
    }

    public function index()
    {
        $data=DB::table("goods1")->orderBy("id","desc")->get()->toArray();
//        dd($data);
        return view("goods_curd/index",['data'=>$data]);
    }

    public function del($id)
    {
        $res=DB::table('goods1')->where('id','=',$id)->delete();
//        dd($res);
        if ($res){
            return redirect('goods_curd/index');
        }
    }

    public function edit($id)
    {
        $data=DB::table('goods1')->where('id','=',$id)->first();
//        dd($data);
        return view('/goods_curd/edit',['data'=>$data]);
    }

    public function update(Request $request )
    {
        /*dd($data);*/
//        dd($data);

        $id=$request->id;
        $data=$request->except(['_token','id']);
//        dd($data);
//
        if($request->file('goods_pic')=='')
        {

//        dd($data);
        $res=DB::table('goods1')->where(['id'=>$id])->update($data);
            if ($res){
                return redirect('/goods_curd/index');
            }
        }else{
            $path=$request->file('goods_pic')->store('/goods_picture/0618');
            $path_url=asset('storage/'.$path);
            $data['goods_pic']=$path_url;

//        dd($data);
            $res=DB::table('goods1')->where(['id'=>$id])->update($data);
            if ($res){
                return redirect('/goods_curd/index');
            }
        }

//
    }


}
