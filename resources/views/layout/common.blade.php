<html>
<head>
    <title>商品首页 - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
    （模板继承）这是主侧边栏。
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>