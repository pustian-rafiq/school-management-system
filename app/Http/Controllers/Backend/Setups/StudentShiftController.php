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

      //Store new student shift
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

    //Edit student shift  
    public function EditStudentShift($id){
      
        $shift = StudentShift::find($id);
         return view('backend.setup.shift.edit_shift', compact('shift'));
     }
     //Update student shift
     public function UpdateStudentShift(Request $request,$id){
       
        $shift = StudentShift::find($id);
 
        $validateData = $request->validate([
         'name' => 'required|unique:student_shifts,name,'.$shift->id
     ]);
 
 
        $shift->name = $request->name;
        
        $shift->save();
 
        $notification = array(
         'message' => 'Student shift updated successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('student.shift.view')->with($notification);
     }
 
 
     //Delete student shift
     public function DeleteStudentShift($id){
       
        $studentShift = StudentShift::find($id);
        $studentShift->delete();
        
        $notification = array(
         'message' => 'Student shift deleted successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('student.shift.view')->with($notification);
     }

}
