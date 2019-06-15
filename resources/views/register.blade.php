<form action="{{url('/do_register')}}" method="post">
    @csrf
    用户名：<input type="text" name="user_name"><br />
    密码：<input type="password" name="user_pwd"><br />
    确认密码：<input type="text" name="user_repwd"><br />
    <input type="submit" value="注册">

</form>