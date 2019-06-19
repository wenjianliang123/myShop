<header>
    <title>商品添加</title>
</header>
    <body>
    <!-- /resources/views/post/create.blade.php -->

    <h1>表单验证提示信息</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- 创建文章表单 -->
        <form action="{{url("goods_curd/do_add")}}" method="post" enctype="multipart/form-data">
            @csrf
            <table border="1">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="goods_name" id="" value=""></td>
                </tr>
                <tr>
                    <td>商品图片</td>
                    <td><input type="file" name="goods_pic" id=""></td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td><input type="number" name="goods_price" id=""></td>
                </tr>
                <tr>

                    <td colspan="2">
                        <input type="submit" value="确认添加" name="" id="">
                    </td>
                </tr>


            </table>
        </form>

    </body>
