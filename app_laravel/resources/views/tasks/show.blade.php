@extends('layout.mainlayout') 

@section('content') 
<div class="container  mt-5 pt-3 mb-3">
    <div class="shadow container border m-3 p-3 rounded">
    <h3 class="text-center">แสดงข้อมูลงาน{{ $task->title }}</h3><hr>
    <div class="p-3 mb-5 ">

        <div class="container mt-3">
            <div class="mt-3">
                <text class="text-left font-weight-bold">ชื่องาน: </text>{{ $task->title }}
            </div>
            <div class="mt-3">
                <text class="text-left font-weight-bold">คำอธิบายงาน: </text>{{ $task->description }}
            </div>
            
        </div>
    </div>
    </div>

</div> 
@endsection 
