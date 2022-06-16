
@extends('layouts.app')
@section('title','Edit Student Data')

@section('main')
	<div class="wrap shadow-sm">
		<a class="btn btn-info mb-3" href="{{route('student.index')}}"> Back</a>
		<div class="card">	
			<div class="card-body">
				<h2 class="text-center text-info">Edit Student Data</h2>

				{{-- Alert massage --}}
				@include('layouts.alert')
				{{-- Alert massage --}}

				<form action="{{route('student.update',$student_edit -> id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{$student_edit -> name}}" type="text">
				
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{$student_edit -> email}}" type="text">
				
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{$student_edit -> cell}}" type="text">
						
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="{{$student_edit -> username}}" type="text">
					
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" value="{{$student_edit -> age}}" type="text">
				
					</div>
					<div class="form-group">
						<label class="my-0" for="">Gender</label>
						<hr class="bg-info">
						<label for="male">
							<input type="radio" name="gender" @if($student_edit -> gender == "male") checked @endif  value="male" id="male">
							Male
						</label>
						<label for="female">
							<input type="radio" name="gender" @if($student_edit -> gender == "female") checked @endif value="female" id="female">
							Female
						</label>
					
					</div>
					<div class="form-group">
						<label class="my-0" for=""> Education</label>
						<hr class="bg-info">
						<select class="form-control" name="education" id="">
							<option class="bg-warning" value="">Select</option>
							<option class="bg-warning" @if($student_edit -> education == 'SSC') selected @endif value="SSC">SSC</option>
							<option class="bg-warning" @if($student_edit -> education == 'HSC') selected @endif value="HSC">HSC</option>
							<option class="bg-warning" @if($student_edit -> education == 'BSC') selected @endif value="BSC">BSC</option>
							<option class="bg-warning" @if($student_edit -> education == 'MSC') selected @endif value="MSC">MSC</option>
						</select>
					
					</div>
					<div class="form-group">
						<label class="my-0" for="">Select Courses</label>
						<hr class="bg-info">

                        @foreach($courses as $course)

						<label for="{{$course}}">
							<input type="checkbox" @if(in_array($course,json_decode($student_edit -> courses))) checked  @endif value="{{$course}}" name="courses[]" id="{{$course}}">
							{{$course}}
						</label>
						<br>
                        @endforeach
						
					</div>

					<div class="form-group">
                        
						<label class="my-0" for="">Change Photo</label>
                        <img style="width:450px; height: 300px;" src="{{url('storage/student_photo/'.$student_edit -> photo)}}" alt="">
                        <br>
                        <hr class="bg-info">
						<label for="upload">
							<input style="display:none" type="file" name="new_photo" id="upload">
							<img style="height:50px;width:50px;cursor:pointer" src="{{url('assets\media\img\upload.png')}}" alt="">
                            <input name="old_photo" value="{{$student_edit -> photo}}" type="hidden">
						</label>
					</div>
					
					<div class="form-group">
						<input class="btn btn-info" type="submit" value="Update Now">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

