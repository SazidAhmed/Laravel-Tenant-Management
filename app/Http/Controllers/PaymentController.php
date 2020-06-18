<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->id);
        if(Auth::user()->role_id=='2'){
            $payments = Payment::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(12);
            return view('payment.index',['role_id'=>Auth::user()->role_id])->with('payments',$payments);
        }
        else{
            $payments = Payment::orderBy('created_at', 'desc')->paginate(12);
            return view('payment.index',['role_id'=>Auth::user()->role_id])->with('payments',$payments);  
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::user()->role_id =='1'){
            return view('payment.create');
        }
        else{
            return redirect('/payment')->with('error','unauthorized');
        }
        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //Create Payment
            $payment = new Payment;
            
            $payment->user_id = $request->input('user_id');
            $payment->month = $request->input('month');
            $payment->status = $request->input('status');
            $payment->rent = $request->input('rent');
            $payment->waterbill = $request->input('waterbill');
            $payment->electbill = $request->input('electbill');
            $payment->services = $request->input('services');
            $payment->others = $request->input('others');
            $payment->due = $request->input('due');
            $payment->total = $payment->rent+$payment->waterbill+$payment->electbill+$payment->services
                            +$payment->others+$payment->due;
            $payment->save();

            return redirect('/payment')->with('success', 'Information Added');   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role_id =='1'){
            $payment = Payment::find($id);
            return view('payment.edit')->with('payment',$payment);
        }
        else{
            return redirect('/payment')->with('error','unauthorized');   
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            //Update Information
            $payment = Payment::find($id);
            
            $payment->rent = $request->input('rent');
            $payment->status = $request->input('status');
            $payment->waterbill = $request->input('waterbill');
            $payment->electbill = $request->input('electbill');
            $payment->services = $request->input('services');
            $payment->others = $request->input('others');
            $payment->due = $request->input('due');
            $payment->total = $payment->rent+$payment->waterbill+$payment->electbill+$payment->services
                            +$payment->others+$payment->due;
            $payment->save();

            return redirect('/payment')->with('success', 'Payment Updated'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(Auth::user()->role_id =='1'){
            $payment = Payment::find($id);
            $payment->delete();
            return redirect('/payment')->with('success', 'Information Removed');
        }
        else{
            return view('welcome'); 
        } 
    }
}
