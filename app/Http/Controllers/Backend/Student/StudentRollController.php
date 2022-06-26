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
}