<table border="1">
    <tr>
        <td>商品ID</td>
        <td>商品名称</td>
        <td>商品图片</td>
        <td>商品图片链接</td>
        <td>商品价格</td>
        <td>添加时间</td>
        <td>操作</td>
    </tr>
    @if($data)
        @foreach($data as $v)
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v->goods_name}}</td>
        <td><a href="{{$v->goods_pic}}"><img src="{{$v->goods_pic}}" width="100" alt=""></a></td>
        <td><a href="{{$v->goods_pic}}">{{$v->goods_pic}}</a></td>
        <td>{{$v->goods_price}}</td>
        <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
        <td>
            <a href="{{url('/goods_curd/edit',['id'=>$v->id])}}">修改</a>
            <a href="del/{{$v->id}}">删除</a>
        </td>

    </tr>
        @endforeach
    @endif
</table>