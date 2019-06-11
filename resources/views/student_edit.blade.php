<form action="/student/update" method="post">
    <input type="hidden" name="student_id" value="{{$data->student_id}}">
    @csrf
    <table border="1">
        <tr>
            <td>姓名</td>
            <td>
                <input type="text" name="student_name" value="{{$data->student_name}}">
            </td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><input type="text" name="student_age" value="{{$data->student_age}}"></td>
        </tr>
        <tr>
            <td>性别</td>
            <td>
                <input type="radio" name="student_sex" id="" value="1" @if($data->student_sex == 1)checked @endif>男
                <input type="radio" name="student_sex" id="" value="2" @if($data->student_sex == 2)checked @endif>女
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit">
            </td>

        </tr>

    </table>
</form>