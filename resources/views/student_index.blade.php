<form action="{{url('/student/index')}}" method="get">
    姓名：<input type="text" name="find_name" id="" value="{{$find_name}}">
    <input type="submit" value="搜索">
</form>
<table border="1">
<tr>
    <td>ID</td>
    <td>姓名</td>
    <td>年龄</td>
    <td>性别</td>
    <td>操作</td>
</tr>
    @if($data)
        @foreach($data as $v)
    <tr>
        <td>{{$v->student_id}}</td>
        <td>{{$v->student_name}}</td>
        <td>{{$v->student_age}}</td>
        <td>{{$v->student_sex}}</td>
        <td>
            <a href="{{url('/student/edit',['id'=>$v->student_id])}}">修改</a>
            <a href="del/{{$v->student_id}}">删除</a>

        </td>
    </tr>
        @endforeach
        @endif
</table>

{{ $data->appends(['find_name' => $find_name])->links() }}