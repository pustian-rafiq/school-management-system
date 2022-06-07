<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeCategory;

class StudentFeeCategoryController extends Controller
{
      //fetch all shifts
      public function ViewStudentFeeCategory(){
        $feeCategories = StudentFeeCategory::latest()->get();
        return view('backend.setup.fee_category.view_fee_category',compact('feeCategories'));
    }
}
