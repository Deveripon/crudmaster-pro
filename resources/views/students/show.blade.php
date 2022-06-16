@extends('layouts.app')
@section('title','show')
@section('main')


<div class="container" style="text-align:center; margin-top:100px">
    <div class="card shadow" style=" width:400px;display:block;margin:auto">
        <div class="card-header">
            <div class="card-image">
                <img class="card-img" src="{{url('storage/student_photo/',$student_data -> photo)}}" alt="">
            </div>
            <div class="card-body text-center">
                <h3 class="text-info"> Name: {{$student_data->name}} </h3>
                <h5 class="text-info">Username: {{$student_data->username}} </h5>
                <h4>Email: {{$student_data->email}} </h4>
                <h4>Cell: {{$student_data->cell}} </h4>
                <h4>Education: {{$student_data->education}} </h4>
                <h4>Courses:
                    <hr class="bg-info"/> 
                    <ul>
                        @foreach(json_decode($student_data -> courses) as $course)
                        <li style="list-style:none">
                            {{$course}}
                        </li>
                        @endforeach
                    </ul>   
                </h4>
                <br>
                <br>
                <a style="width:150px" class="btn btn-info"href="{{route('student.index')}}">Show all Students</a>
                <a style="width:150px" class="btn btn-warning"href="{{route('student.edit',$student_data -> id)}}">Edit Data</a>
            </div>
        </div>
    </div>
</div>





@endsection