<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    //fetch all designations
    public function ViewDesignation(){
        $designations = Designation::latest()->get();
        return view('backend.setup.designation.view_designation',compact('designations'));
    }
}