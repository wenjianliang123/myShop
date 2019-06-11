<form action="do_add" method="post">
    @csrf
    <table border="1">
        <tr>
            <td>姓名</td>
            <td><input type="text" name="student_name"></td>
        </tr>
        <tr>
            <td>性别</td>
            <td>
                <input type="radio" name="student_sex" id="" value="1">男
                <input type="radio" name="student_sex" id="" value="2">女
            </td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><input type="text" name="student_age"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit">
            </td>

        </tr>

    </table>
</form>