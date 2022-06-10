<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentClass;
use App\Models\SchoolSubject;

class AsignSubject extends Model
{
    use HasFactory;

    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function school_subject(){
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');
    }
}