<?php

namespace App\Http\Controllers\Backend\Setups;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    //fetch all subjects
    public function ViewSchoolSubject(){
        $subjects = SchoolSubject::latest()->get();
        return view('backend.setup.school_subject.view_school_subject',compact('subjects'));
    }
}