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
        // $assignSubjects = AsignSubject::latest()->get();

        $assignSubjects = AsignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',compact('assignSubjects'));
    }

     //Show assign subject add form
     public function AddAssignSubject(){
        $assignSubjects = SchoolSubject::all();
        $classes = StudentClass::all();
      return view('backend.setup.assign_subject.add_assign_subject',compact('assignSubjects','classes'));
      }

       //Store assign subject
       public function StoreAssignSubject(Request $request){
        $countSubject = count($request->subject_id);

        if($countSubject !== null){

        if($countSubject !== null){
          for ($i=0; $i < $countSubject ; $i++) { 
              $assignSubject = new AsignSubject();

              $assignSubject->class_id = $request->class_id;
              $assignSubject->subject_id = $request->subject_id[$i];
              $assignSubject->full_mark = $request->full_mark[$i];
              $assignSubject->pass_mark = $request->pass_mark[$i];
              $assignSubject->subjective_mark = $request->subjective_mark[$i];

              $assignSubject->save();
          }
        }
        $notification = array(
          'message' => 'Assign subject inserted successfully',
          'alert-type' => 'success'
      );

      return redirect()->route('assign.subject.view')->with($notification);
      }
  }

    //Edit assign subject
    public function EditAssignSubject($id){
      $editData = AsignSubject::where('subject_id',$id)->orderBy('class_id')->get();
      $subjects = SchoolSubject::all();
      $classes = StudentClass::all();

      return view('backend.setup.assign_subject.edit_assign_subject',compact('editData','subjects','classes'));
    }

 //Update assign subject
 public function UpdateAssignSubject(Request $request, $id){

      if($request->subject_id == NULL){
        $notification = array(
          'message' => 'You have to select subject',
          'alert-type' => 'error'
      );

      return redirect()->back()->with($notification);
      }else{
        $countSubject = count($request->subject_id);
        AsignSubject::where('class_id',$id)->delete();
          for ($i=0; $i < $countSubject ; $i++) { 
                $assignSubject = new AsignSubject();

                $assignSubject->class_id = $request->class_id;
                $assignSubject->subject_id = $request->subject_id[$i];
                $assignSubject->full_mark = $request->full_mark[$i];
                $assignSubject->pass_mark = $request->pass_mark[$i];
                $assignSubject->subjective_mark = $request->subjective_mark[$i];

                $assignSubject->save();
            }                  
      }
      $notification = array(
        'message' => 'Assign subject updated successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('assign.subject.view')->with($notification);
    }
   // Details assign subject
   public function DetailsAssignSubject($id){
    $detailsData = AsignSubject::where('class_id',$id)->orderBy('class_id')->get();
    $subjects = SchoolSubject::all();
    $classes = StudentClass::all();

    return view('backend.setup.assign_subject.details_assign_subject',compact('detailsData'));
  }

}