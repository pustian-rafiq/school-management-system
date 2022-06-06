<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    //fetch all years
    public function ViewStudentYear(){
        $years = StudentYear::latest()->get();
        return view('backend.setup.year.view_year',compact('years'));
    }

    //Show student year add form
    public function AddStudentYear(){
        return view('backend.setup.year.add_year');
    }

    //Store new student year
    public function StoreStudentYear(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Student year added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    //Edit student class show
    public function EditStudentYear($id){
      
       $year = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('year'));
    }
    //Update student class
    public function UpdateStudentYear(Request $request,$id){
      
       $year = StudentYear::find($id);

       $validateData = $request->validate([
        'name' => 'required|unique:student_years,name,'.$year->id
    ]);


       $year->name = $request->name;
       
       $year->save();

       $notification = array(
        'message' => 'Student year updated successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('student.year.view')->with($notification);
    }


    //Delete student class
    public function DeleteStudentYear($id){
      
       $studentYear = StudentYear::find($id);
       $studentYear->delete();
       
       $notification = array(
        'message' => 'Student year deleted successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('student.year.view')->with($notification);
    }
}
