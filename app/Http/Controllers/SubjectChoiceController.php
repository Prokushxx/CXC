<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Subject_Choice;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubjectChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choices = Subject_Choice::with('student','subject')->paginate(6);
        // dd($choices);
        return view('choices.index',['choices'=>$choices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      // $student = Student::find($id);
      // $subjects = Subject::all();
      // return view('choices.show',['subjects'=>$subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subject_Choice::create([
          'student_id'=> $request->id,
          'subject_id'=> $request->subject,
          'year_of_exam'=> $request->year,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject_Choice  $subject_Choice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $total =  DB::table('subject_choices')->join('subjects','subjects.id','=','subject_choices.subject_id')->where('student_id',$id)->sum('cost_amt');
      $student = Subject_Choice::with('student','subject')->where('student_id',$id)->paginate(4);
      $name =  Student::with('subject_choices')->where('id',$id)->get()->toArray();
      $subjects = Subject::all();
      $sub = Subject_Choice::where('id',$id)->get();
      $payment = Payment::where('student_id',$id)->sum('amount_paid');
      $payments = Payment::where('student_id',$id)->get()->toArray();
      // dd($payments);
      return view('choices.show',compact('name','sub','subjects','student','total','payment','payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject_Choice  $subject_Choice
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject_Choice $subject_Choice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject_Choice  $subject_Choice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject_Choice $subject_Choice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject_Choice  $subject_Choice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // dd($id);
      $sub = Subject_Choice::find($id);
      // dd($sub);
        $sub->delete();
        return redirect()->back();
      }
}
