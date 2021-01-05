@extends('layout.mainlayout') 
@section('content') 
<div class="container pt-5">
    <div class="container border bg-light  rounded m-3 mb-3">
        <h1 class="text-center mt-2">แก้ไขงาน</h1><hr>
    <form action="{{ url('tasks', [$task->id]) }}" method="POST">
        <input type="hidden" name="_method" value="PUT" >
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">ชื่องาน</label> 
            <input type="text" value="{{$task->title}}" class="form-control" id="taskTitle" name="title">
        </div>
        <div class="form-group">
            <label for="description">คำอธิบายงาน</label> 
            <input type="text" value="{{$task->description}}" class="form-control" id="taskDescription" name="description">
        </div>

        @if($errors->any()) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach($errors->all() as $error) 
                    <li> {{$error}} </li>
                @endforeach 
            </ul> 
        </div> 
        @endif 
        <div class="text-center">
            <button type="submit" class="btn btn-primary mb-2">บันทึก</button> 
        </div>
    </form> 
 
    </div> 
</div> 
@endsection 
