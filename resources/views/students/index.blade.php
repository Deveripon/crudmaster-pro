@extends('layouts.app');
@section('title','Our Students')

@section('main')
	<div class="wrap-table shadow-sm" style="width:1400px">
		<a class="btn btn-info mb-3" href="{{route('student.create')}}">Add New Student</a>
		<div class="card">
			@include('layouts.alert')
			<div class="card-body">
				<h2 class="text-center text-info">Our Students</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Education</th>
							<th>Course</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


					@forelse($students as $student)
						<tr>
							<td>{{$loop -> index +1}}</td>
							<td>{{$student -> name}}</td>
							<td>{{$student -> email}}</td>
							<td>{{$student -> cell}}</td>
							<td>{{$student -> username}}</td>
							<td>{{$student -> age}}</td>
							<td>{{$student -> gender}}</td>
							<td>{{$student -> education}}</td>
							<td>
								<ul>
									@foreach(json_decode($student -> courses) as $course)
									<li>{{$course}}</li>
									@endforeach
								</ul>
							</td>
							<td>
								<img src="{{url('storage/student_photo/'.$student ->photo)}}" alt="">
							</td>
							<td>
								<a class="btn btn-sm btn-info" href="{{route('student.show',$student -> id)}}">View</a>
								<a class="btn btn-sm btn-warning" href="{{route('student.edit',$student -> id)}}">Edit</a>
								<a class="btn btn-sm btn-danger" href="{{route('student.destroy',$student -> id)}}">Delete</a>
							</td>
						</tr>
						@empty
						<td class="text-center" colspan="11">No Data Found</td>
					@endforelse

					</tbody>
				</table>
			</div>
		</div>
	</div>
	@endsection