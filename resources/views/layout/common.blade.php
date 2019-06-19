<html>
<head>
    <title>商品首页 - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
    （模板继承）这是主侧边栏。

    {{"这是取出来的用户名:".Session::get("user_name")}}

    @if(empty(session("user_name")))
        {{"session值为空在common模板"}}
    @endif
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>