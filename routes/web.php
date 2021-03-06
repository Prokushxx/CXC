<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectChoiceController;
use App\Models\Student;
use App\Models\Subject;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
 $students= Student::paginate(4);
        return view('allstudents',['students'=>$students]);
});

Route::resource('Student', StudentController::class);
Route::resource('Subject', SubjectController::class);
Route::resource('SubjectChoice', SubjectChoiceController::class);
Route::resource('Payment',PaymentController::class);  