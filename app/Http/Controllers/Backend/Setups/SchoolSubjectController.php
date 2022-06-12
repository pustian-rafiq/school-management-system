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

     //Edit school subject  
     public function EditSchoolSubject($id){
      
        $subject = SchoolSubject::find($id);
         return view('backend.setup.school_subject.edit_school_subject', compact('subject'));
     }

      //Update subject
      public function UpdateSchoolSubject(Request $request,$id){
       
        $subject = SchoolSubject::find($id);
 
        $validateData = $request->validate([
         'name' => 'required|unique:school_subjects,name,'.$subject->id
     ]);
     $subject->name = $request->name;
        
     $subject->save();

     $notification = array(
      'message' => 'Subject updated successfully',
      'alert-type' => 'success'
  );
  return redirect()->route('school.subject.view')->with($notification);
  }

    //Delete subject
    public function DeleteSchoolSubject($id){
       
        $subject = SchoolSubject::find($id);
        $subject->delete();
        
        $notification = array(
         'message' => 'Subject deleted successfully',
         'alert-type' => 'success'
     );
     return redirect()->route('school.subject.view')->with($notification);
     }

     
// rafiqul.pust.cse@gmail.com
// Md. Rafiqul Islam
// $2y$10$WaCYv6YvbWxkE3nP2Dy7m.qa0o7UH//UbJ.nKWRtiJpYsCMW4Z4Em
// 202206050157logo6.png

}