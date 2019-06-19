<form action="{{url('/goods_curd/update')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$data->id}}">
    @csrf
    <table border="1">
        <tr>
            <td>商品名称</td>
            <td><input type="text" name="goods_name" id="" value="{{$data->goods_name}}"></td>
        </tr>
        <tr>
            <td>商品图片</td>
            <td><input type="file" name="goods_pic" id="" value="{{$data->goods_pic}}"></td>
        </tr>
        <tr>
            <td>商品价格</td>
            <td><input type="text" name="goods_price" id="" value="{{$data->goods_price}}"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="" value="提交" id=""></td>
        </tr>
    </table>

</form>