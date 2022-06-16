<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Student Home page by index method

    public function index()
    {
        $students = Student::latest() -> get();
        return view('students.index',[
            'students'   => $students
        ]);
    }

    //Define Students Create page

    public function create()
    {
        return view('students.create');
    }

    //store spacific student data 
    public function store(Request $request)
    {
        $this-> validate($request,[
            'name'                => 'required',
            'email'               => 'required|unique:students|email',
            'cell'                => 'required|numeric|starts_with:01,8801,+8801|digits_between:11,16',
            'username'            => 'required|unique:students',
            'age'                 => 'required|numeric',
            'gender'              => 'required',
            'education'           => 'required',
        ]);

        //Photo uploading feature
        if($request->hasFile('photo')){
            $img = $request -> file('photo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();
            $img -> move(storage_path('app/public/student_photo/'),$file_name);
        }else{
            $file_name = null;
        }

        Student::create([
         'name'              => $request -> name,   
         'email'             => $request ->email,   
         'cell'              => $request ->cell,   
         'username'          => $request ->username,   
         'age'               => $request ->age,   
         'gender'            => $request ->gender,   
         'education'         => $request ->education,   
         'courses'           => json_encode($request ->courses),
         'photo'             => $file_name   
 
        ]);
       return back() -> with('success','Data added Successfully!');
    }

    //Show spacific data in single page
    public function show($id)
    {
        $student_data = Student::findOrFail($id);
        return view('students.show',[
            'student_data'      => $student_data
        ]);
    }

    //edit specific Student Data
    public function edit($id)
    {
        $student_edit = Student::findOrFail($id);
        return view('students.edit',[
            'student_edit'  => $student_edit,
            'courses'       => ['Mern Steak Development','Javascript Development','Python Development',' Laravel Development','Android App Development','NFT Development']
        ]);
    }

    //Update Specified Student data

public function update(Request $request,$id)
{

        if($request -> hasFile('new_photo')){
            $img = $request -> file('new_photo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();
            $img -> move(storage_path('app/public/student_photo/'),$file_name);

            unlink('storage/student_photo/'.$request -> old_photo);
        }else{
            $file_name = $request->old_photo;
        }


     $student_update = Student::findOrFail($id);
     $student_update -> update([
        'name'              => $request -> name,   
         'email'             => $request ->email,   
         'cell'              => $request ->cell,   
         'username'          => $request ->username,   
         'age'               => $request ->age,   
         'gender'            => $request ->gender,   
         'education'         => $request ->education,   
         'courses'           => json_encode($request ->courses),
         'photo'             => $file_name   
     ]);


     return back()-> with('success','Data Updated Successfully  ');

}

//delete specified Student data
public function destroy($id)
{
    $student_delete = Student::findOrFail($id);
    $student_delete -> delete();
    
    return back() -> with('success','Data deleted Successfully ');
}





}
