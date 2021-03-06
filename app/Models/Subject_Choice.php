<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_Choice extends Model
{
    use HasFactory;

    protected $table = 'subject_choices';

    protected $fillable = [
      'student_id',
      'subject_id',
      'status',
      'year_of_exam'
    ];

    public function student(){
      return $this->belongsTo(Student::class);
    }

    public function subject(){
      return $this->belongsTo(Subject::class);
    }
}
