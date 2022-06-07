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
}
