@extends('layout.mainlayout')

@section('content')

    <div class="container  mt-5 pt-3">
    @if(Session::has('message'))
        <div class="alert alert-info">{{Session::get('message')}}</div>
    @endif

    foreach ($tasks as $task) {
    echo $Answer->StudentCode;
}
    <table class="table rounded">
        <thead class="thead-dark">
            <tr class="m-2">
                <th scoop="col">Id</th>
                <th scoop="col">ชื่องาน</th>
                <th scoop="col">คำอธิบายงาน</th>
                <th scoop="col">สร้างเมื่อ</th>
                <th scoop="col" class="pl-4">จัดการข้อมูล</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td><a href="/tasks/{{$task->id}}">{{$task->title}}</a></td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->created_at->toFormattedDateString()}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ URL::to('tasks/' . $task->id . '/edit') }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                        <form action="{{url('tasks', [$task->id])}}" method="post"> 
                            <input type="hidden" name="_method" value="delete"> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <input type="submit" class="btn btn-danger ml-1" value="Delete">
                        </form>
                        </div> 
                    </td> 
                </tr> 
            @endforeach

        </tbody>
    </table>
    </div>
@endsection