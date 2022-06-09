<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\AsignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AsignSubjectController extends Controller
{
     //fetch all fee amounts
     public function ViewAssignSubject(){
         $assignSubjects = AsignSubject::latest()->get();

        //$feeAmounts = StudentFeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',compact('assignSubjects'));
    }

     //Show student fee amount add form
     public function AddAssignSubject(){
        $subjects = SchoolSubject::all();
        $classes = StudentClass::all();
      return view('backend.setup.assign_subject.add_assign_subject',compact('subjects','classes'));
      }

}