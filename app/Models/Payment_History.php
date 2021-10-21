<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_History extends Model
{
    use HasFactory;

    protected $fillable = [
      'student_id',
      'amount_paid',
      'date_paid',
      'description',
    ];

    public function student(){
      return $this->belongsTo(Student::class);
    }
}
