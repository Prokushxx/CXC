<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentReq;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_Choice;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Student::paginate(4);
        return view('allstudents',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $subjects = Subject::all();
      return view('studentadd',['subjects'=>$subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentReq $request)
    {
        Student::create(
          [
            'first_nm'=>$request->fname,
            'last_nm'=>$request->lname,
            'dob'=>$request->dob,
            'phone_nbr'=>$request->phone,
            'class'=>$request->class,
            'email_addr'=>$request->email,
            'gender'=>$request->gender,
          ]);

          // Subject_Choice::create([
          //   // 'student_id'=>$student->id,
          //   'subject_id'=>$request->subject,
          // ]);

          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student,$id)
    {
      // $subjects = Subject::all();
      $student = Student::find($id);
        return view('studentedit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student,$id)
    {
      $student = Student::find($id);
      
          $student->first_nm=$request->fname;
          $student->last_nm=$request->lname;
          $student->dob=$request->dob;
          $student->class=$request->class;
          $student->phone_nbr=$request->phone;
          $student->email_addr=$request->email;
          $student->save();

          // Subject_Choice::Create([
          //   'student_id'=>$student->id,
          //   'subject_id'=>$request->subject,
          //   'year_of_exam'=>$request->,
          // ]);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back();
    }
}
