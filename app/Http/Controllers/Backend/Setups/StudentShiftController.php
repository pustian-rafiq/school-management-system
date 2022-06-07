<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
       //fetch all shifts
       public function ViewStudentShift(){
        $shifts = StudentShift::latest()->get();
        return view('backend.setup.shift.view_Shift',compact('shifts'));
    }

     //Show student shift add form
     public function AddStudentShift(){
        return view('backend.setup.shift.add_shift');
       }

      //Store new student group
      public function StoreStudentShift(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Student shift added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
}
