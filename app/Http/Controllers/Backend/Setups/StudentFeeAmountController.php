<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeAmount;
use App\Models\StudentFeeCategory;
use App\Models\StudentClass;

class StudentFeeAmountController extends Controller
{
     //fetch all fee amounts
     public function ViewStudentFeeAmount(){
        $feeAmounts = StudentFeeAmount::latest()->get();
        return view('backend.setup.fee_amount.view_fee_amount',compact('feeAmounts'));
    }

      //Show student fee amount add form
      public function AddStudentFeeAmount(){
          $fee_categories = StudentFeeCategory::all();
          $classes = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount',compact('fee_categories','classes'));
       }
}
