<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $gender = ['male','female'];
      
        return [
            'first_nm'=> $this->faker->colorName(),
            'last_nm'=> $this->faker->colorName(),
            'dob'=>$this->faker->date(),
            'class'=>$this->faker->year(),
            'phone_nbr'=>$this->faker->phoneNumber(),
            'email_addr'=>$this->faker->address(),
            'gender'=> 'gender',
        ];
    }
}
