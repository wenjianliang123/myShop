<form action="{{url('/goods/do_add')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table border="1">
        <tr>
            <td>货物名称</td>
            <td><input type="text" name="goods_name" id=""></td>
        </tr>
        <tr>
            <td>货物图片</td>
            <td><input type="file" name="goods_img" id=""></td>
        </tr>
        <tr>
            <td>库存</td>
            <td><input type="text" name="goods_number" id=""></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="" value="提交" id=""></td>
        </tr>
    </table>

</form>