<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    //View student roll generate
    public function ViewRollGenerator(){
        $classes = StudentClass::all();
        $years = StudentYear::all();
    
        return view('backend.student.roll.view_roll_generator', compact('classes', 'years'));
    }

    //View student roll generate
    public function getStudents(Request $request){
        $classes = StudentClass::all();
        $years = StudentYear::all();
    
        $students = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
  
      return response()->json($students);
    }
// Store student roll
    public function storeStudentRoll(Request $request){

       // return $request->all();
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	if ($request->student_id !=null) {
    		for ($i=0; $i < count($request->student_id); $i++) { 
    			AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
    		} // end for loop
    	}else{
    		$notification = array(
    		'message' => 'Sorry there are no student',
    		'alert-type' => 'error'
    	);

    	   return redirect()->back()->with($notification);
    	} // End IF Condition

       $notification = array(
    		'message' => 'Well Done Roll Generated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.roll.generate.view')->with($notification);

    }// end Method 
}