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
      'email_nbr',
    ];

    // public function subject_choices(){
    //   $this->hasMany(SubjectChoice::class);
    // }

    // public function transactions(){
    //   $this->hasMany(Transaction::class);
    // }
    // public function payments(){
    //   $this->hasMany(Transaction::class);
    // }

    // public function payment_history(){
    //   $this->hasMany(Transaction::class);
    // }
}
