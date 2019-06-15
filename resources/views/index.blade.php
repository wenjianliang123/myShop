@extends('layout.common')

@section('title', 'WJL Page')

@section('sidebar')
    @parent
    {{--@parent在这个示例中， sidebar 片段利用 @parent 指令向布局的 sidebar 追加（而非覆盖）内容。 在渲染视图时，@parent 指令将被布局中的内容替换。
--}}
    <p>This is appended to the master sidebar.</p>
    <p>（模板继承）这是附加到主侧边栏的。</p>

@endsection

@section('content')
    <p>This is my body content.</p>
    <p>（模板继承）这就是我的身体内容。</p>
@endsection



