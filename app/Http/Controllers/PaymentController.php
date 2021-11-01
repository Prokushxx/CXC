<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Payment_History;
use App\Models\Transaction;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pay = $request->payment;
        $total = $request->total;

        Payment::create([
          'student_id'=>$request->StudentId,
          'subject_id'=>$request->SubjectId,
          'amount_paid'=>$request->amount,
          'balance_amt'=>$request->balance_amt,
        ]);

        Transaction::create([
          'student_id'=>$request->StudentId,
          'amount_due'=>$request->Total,
          'amount_paid'=>$request->payment,
          'balance_amt'=>$request->balance_amt,
          'year_of_exam'=>$request->date,
        ]);


        Payment_History::create([
          'student_id'=>$request->StudentId,
          'amount_paid'=>$request->payment,
          'date_paid'=>$request->date,
          'description'=>'Testing my work',
        ]);
      
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
