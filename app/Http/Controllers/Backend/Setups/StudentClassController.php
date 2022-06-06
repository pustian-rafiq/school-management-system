<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    //fetch all class
    public function ViewStudentClass(){
        $students = StudentClass::latest()->get();
        return view('backend.setup.class.view_class',compact('students'));
    }

    //Show student add form
    public function AddStudentClass(){
        return view('backend.setup.class.add_class');
    }

    //Store new student class
    public function StoreStudentClass(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'New student added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    //Edit student class show
    public function EditStudentClass($id){
      
       $student = StudentClass::find($id);
        return view('backend.setup.class.edit_class', compact('student'));
    }
    //Update student class
    public function UpdateStudentClass(Request $request,$id){
      
       $student = StudentClass::find($id);

       $validateData = $request->validate([
        'name' => 'required|unique:student_classes,name,'.$student->id
    ]);


       $student->name = $request->name;
       
       $student->save();

       $notification = array(
        'message' => 'Student updated successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('student.class.view')->with($notification);
    }


    //Delete student class
    public function DeleteStudentClass($id){
      
       $student = StudentClass::find($id);
       $student->delete();
       
  

       $notification = array(
        'message' => 'Student deleted successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('student.class.view')->with($notification);
    }
}
