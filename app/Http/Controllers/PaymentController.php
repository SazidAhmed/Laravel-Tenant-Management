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

    public function index()
    {
         // dd(Auth::user()->id);
        if(Auth::user()->role_id=='2'){
            $payments = Payment::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(12);
            return view('users.payment',['role_id'=>Auth::user()->role_id])->with('payments',$payments);
            
        }
        else{
            $payments = Payment::orderBy('created_at', 'desc')->paginate(12);
            return view('users.payment',['role_id'=>Auth::user()->role_id])->with('payments',$payments);  
        }
    }

    
   
    public function store(Request $request)
    {
        // dd($request);
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

        return redirect()->back()->with('message', 'Payment Has Been Added Successfully!');
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);

        $payment->user_id = $request->input('user_id');
        $payment->month = $request->input('month');
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

        return redirect()->back()->with('message', 'Payment Has Been Updated Successfully!');
        
    }

    public function destroy($id)
    {
      
        Payment::find($id)->delete();
        return redirect()->back()->with('message', 'Payment Has Been Deleted Successfully!');

    }
}
