<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    

    protected $fillable = [
      'first_nm',
      'last_nm',
      'dob',
      'class',
      'phone_nbr',
      'email_addr',
      'gender',
    ];

    public function subject_choices(){
    return $this->hasMany(Subject_Choice::class,'student_id');
    }

    public function transactions(){
    return $this->hasMany(Transaction::class,'student_id');
    }
    public function payments(){
     return $this->hasMany(Transaction::class,'student_id');
    }

    public function payment_history(){
     return $this->hasMany(Transaction::class,'student_id');
    }
}
