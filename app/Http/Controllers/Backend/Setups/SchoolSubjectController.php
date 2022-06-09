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

     //Show subject add form
     public function AddSchoolSubject(){
        return view('backend.setup.school_subject.add_school_subject');
       }
    //Store subject
    public function StoreSchoolSubject(Request $request){
      
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = new SchoolSubject();

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Subject added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }

}