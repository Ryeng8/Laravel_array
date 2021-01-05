@extends('layout.mainlayout')

@section('content')
<div class="container pt-5">
    <div class="container border bg-light  rounded m-3 mb-3">
        <h1 class="text-center mt-2">เพิ่มงานใหม่</h1> 
    <hr> 
    <form class="container" action="/tasks" method="post"> 
        {{ csrf_field() }} 
        <div class="form-group"> 
            <label for="title">ชื่องาน</label> 
            <input type="text" class="form-control" id="taskTitle" name="title"> 
        </div> 
        <div class="form-group mt-5">
            <label for="description">คำอธิบายงาน</label> 
            <input type="text" class="form-control" id="taskDescription" name="description">
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul> 
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach 
                </ul>
            </div>
        @endif
        <div class="text-center">
        <button type="submit" class="btn btn-primary mb-3">บันทึก</button>
        </div>
    </form>
    </div>
</div>
@endsection 
