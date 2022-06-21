<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;
/**
 * One-to-one and one-to-many relationship er somai child model theke parent model er belongsTo() relation hbe
 * One-to-one er somai parent model theke child model er hasOne() relation hbe
 * One-to-many er somai parent model theke child model er hasMany() relation hbe
 * Many-to-many er somai parent model theke and child model theke belongsToMany() relation hbe
*/

    public function student(){
        return $this->belongsTo(User::class, 'student_id','id');
    }

    public function student_class(){
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }

    public function student_year(){
        return $this->belongsTo(StudentYear::class, 'year_id','id');
    }

    /**
     * ekhane AssignStudent table parent and DiscountStudent table hoilo child table
     * Child theke parent model er relationship hbe belongsTo()
     * 2nd parameter hbe child table er foreign key and 3rd parameter hbe parent table er primary key
     * 
     * Generally always 2nd parameter hbe foreign key and 3rd parameter hbe primary key
     * 
     * But jakhn parent table theke child table er belongsTo() kora habe
     * takhn 2nd parameter hbe child table er foreign key and 3rd parameter hbe parent tabler primary key
    */

    // public function discount(){
    //     return $this->belongsTo(DiscountStudent::class, 'id','assign_student_id');
    // }

    public function discount(){
        return $this->hasOne(DiscountStudent::class, 'assign_student_id','id');
    }


}