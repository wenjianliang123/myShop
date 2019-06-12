<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use App\Http\Tools\Tools;
//redis第一种方法
*/
use DB;
class studentController extends Controller
{
    /*public $tools;
    public  function  __construct(Tools $tools)
    {
        $this->tools=$tools;
//    redis第一种方法
    }*/

    public function index(Request $request)
    {
        /*$redis=$this->tools->getRedis();
        $redis->incr('num');
//        redis第一种方法
        */

        $redis= new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
//        redis第二种方法


        $req =$request->all();
        if (isset($req['find_name'])){
            $student_info=DB::table('student')->where('student_name','like','%'.$req['find_name'].'%')->paginate(1);
        }else{
            $req['find_name']="";
            $student_info=DB::table('student')->paginate(1);
        }

        $stu_info=$student_info->toArray();
        $stu_info=json_encode($stu_info);
        $redis->set('stu_info',$stu_info,60);
//        dd($student_info);
//        die;
//        dd($student_info);
        return view('student_index',['data'=>$student_info,'find_name'=>$req['find_name']]);
    }
    public function add()
    {

        /*$redis= new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num=$redis->get('num');
        echo $num."<br/>";
//        redis第一种方法
        */


        $redis= new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num=$redis->get('num');
        echo $num."<br/>";
//        redis第二种方法


        return view('student_add');
    }
    public function do_add(Request $request)
    {
        //白伟老师的方法
//        echo "111";
//        $data=$request->all();
//        dd($data);
//        $result=DB::table('student')->insert([
//            'student_name'=>$data['student_name'],
//            'student_age'=>$data['student_age'],
//            'student_sex'=>$data['student_sex'],
//        ]);
//        dd($result);die;

        //李翔的方法
        $data=$request->except(['_token']);
        $result=DB::table('student')->insert($data);
//        dd($result);
        if ($result){
            return redirect('/student/index');
        }
    }

    public function del($id)
    {
        $res=DB::table('student')->where('student_id','=',$id)->delete();
//        dd($res);
        if ($res){
            return redirect('student/index');
        }
    }

    public function edit($id){
//        echo 1;
//        $student_id='student_id';
//        $student_id=$id;
//        dd($student_id);
        $data=DB::table('student')->where('student_id','=',$id)->first();
//        dd($data);
        return view('student_edit',['data'=>$data]);

    }
    public function update(Request $request)
    {

        /*dd($data);*/
//        dd($data);
        $student_id=$request->student_id;
        $data=$request->except(['_token','student_id']);
//        dd($data);
        $res=DB::table('student')->where(['student_id'=>$student_id])->update($data);
        if ($res){
            return redirect('/student/index');
        }
    }



}
