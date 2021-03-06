<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
      'student_id',
      'subject_id',
      'amount_paid',
      'balance_amt',
      // 'date_paid',
    ];

    public function student(){
      return $this->belongsTo(Student::class);
    }

    public function subject(){
      return $this->belongsTo(Subject::class);
    }
}
