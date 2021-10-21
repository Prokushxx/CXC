<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subjects = ['Spanish','English','Math','History'];

      foreach ($subjects as $sub){
        Subject::create([
          'subject_nm'=>$sub,
          'cost_amt'=>5000,
        ]);
      }
        
    }
}
