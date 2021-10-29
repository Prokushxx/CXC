<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Student;
use App\Models\Subject_Choice;
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
        $choices = Subject_Choice::with('student','subject')->get()->toArray();
        dd($choices);
        return view('choices.index',['choices'=>$choices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject_Choice  $subject_Choice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Subject_Choice::with('student','subject')->where('id',$id)->get()->toArray();
        // dd($student);  
        $subjects= Subject::all();
        return view('choices.show',compact('student','subjects'));
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
    public function destroy(Subject_Choice $subject_Choice)
    {
        //
    }
}
