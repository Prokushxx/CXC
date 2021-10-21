<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
      'student_id',
      'amount_due',
      'amount_paid',
      'balance_amt',
      'year_of_exam',
    ];

    public function student(){
      return $this->belongsTo(Student::class);
    }
}
