
@extends('layouts.app')
@section('title','Add New Student')

@section('main')
	<div class="wrap shadow-sm">
		<a class="btn btn-info mb-3" href="{{route('student.index')}}"> Back</a>
		<div class="card">	
			<div class="card-body">
				<h2 class="text-center text-info">Add New Student</h2>

				{{-- Alert massage --}}
				@include('layouts.alert')
				{{-- Alert massage --}}

				<form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{old('name')}}" type="text">
						@error('name')
							<p class="text-danger">*Required</p>
						@enderror
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{old('email')}}" type="text">
						@error('email')
						<p class="text-danger">*Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{old('cell')}}" type="text">
						@error('cell')
						<p class="text-danger">*Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="{{old('username')}}" type="text">
						@error('username')
						<p class="text-danger">*Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" value="{{old('age')}}" type="text">
						@error('age')
						<p class="text-danger">*Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label class="my-0" for="">Gender</label>
						<hr class="bg-info">
						<label for="male">
							<input type="radio" name="gender" value="male" id="male">
							Male
						</label>
						<label for="female">
							<input type="radio" name="gender" value="female" id="female">
							Female
						</label>
						@error('gender')
						<p class="text-danger">*Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label class="my-0" for=""> Education</label>
						<hr class="bg-info">
						<select class="form-control" name="education" id="">
							<option class="bg-warning" value="">Select</option>
							<option class="bg-warning" value="SSC">SSC</option>
							<option class="bg-warning" value="HSC">HSC</option>
							<option class="bg-warning" value="BSC">BSC</option>
							<option class="bg-warning" value="MSC">MSC</option>
						</select>
						@error('education')
						<p class="text-danger">*Required</p>
						@enderror
					</div>
					<div class="form-group">
						<label class="my-0" for="">Select Courses</label>
						<hr class="bg-info">
						<label for="Mern">
							<input type="checkbox" value="Mern Steak Development" name="courses[]" id="Mern">
							Mern Steak Development
						</label>
						<br>
						<label for="java">
							<input type="checkbox" value="Javascript Development" name="courses[]" id="java">
							Javascript Development
						</label>
						<br>
						<label for="python">
							<input type="checkbox" value="Python Development" name="courses[]" id="python">
							Python Development
						</label>
						<br>
						<label for="laravel">
							<input type="checkbox" value="Laravel Development" name="courses[]" id="laravel">
							Laravel Development
						</label>
						<br>
						<label for="aap">
							<input type="checkbox" value="Android App Development" name="courses[]" id="aap">
							Android App Development
						</label>
						<br>
						<label for="nft">
							<input type="checkbox" value="NFT Development" name="courses[]" id="nft">
							NFT Development
						</label>
						<br>
						@error('courses[]')
						<p class="text-danger">*Required</p>
						@enderror
					</div>

					<div class="form-group">
						<label class="my-0" for="">Upload Photo</label>
						<hr class="bg-info">
						<label for="upload">
							<input style="display:none" type="file" name="photo" id="upload">
							<img style="height:50px;width:50px;cursor:pointer" src="{{url('assets\media\img\upload.png')}}" alt="">
						</label>
					</div>
					
					<div class="form-group">
						<input class="btn btn-info" type="submit" value="Add Now">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

