<form action="{{url('/goods/update')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="goods_id" value="{{$data->goods_id}}">
    @csrf
    <table border="1">
        <tr>
            <td>货物名称111111</td>
            <td><input type="text" name="goods_name" id="" value="{{$data->goods_name}}"></td>
        </tr>
        <tr>
            <td>货物图片</td>
            <td><input type="file" name="goods_img" id="" value="{{$data->goods_img}}"></td>
        </tr>
        <tr>
            <td>库存</td>
            <td><input type="text" name="goods_number" id="" value="{{$data->goods_number}}"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="" value="提交" id=""></td>
        </tr>
    </table>

</form>