<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    //fetch all groups
    public function ViewStudentGroup(){
        $groups = StudentGroup::latest()->get();
        return view('backend.setup.group.view_group',compact('groups'));
    }
}
