<form action="{{url('/do_add_goods')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="goods_source" id="">
    <input type="submit" value="提交">
</form>