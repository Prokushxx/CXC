<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_Choice extends Model
{
    use HasFactory;

    protected $fillable = [
      'status',
      'year_of_exam',
    ];

    public function student(){
      return $this->belongsTo(Student::class,'student_id');
    }

    public function subject(){
      return $this->belongsTo(Student::class,'subject_id');
    }
}
