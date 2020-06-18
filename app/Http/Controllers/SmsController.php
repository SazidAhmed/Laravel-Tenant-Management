<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;
use Illuminate\Support\Facades\Auth;

class SmsController extends Controller
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
        if(Auth::user()->role_id ==1){
            $smss = Sms::orderBy('created_at', 'desc')->paginate(5);
            return view('sms.index')->with('smss', $smss);
        }
        else{
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'message' => 'required',
        ]);
            //Create sms
            $sms = new Sms;
            $sms->name = $request->input('name');
            $sms->email = $request->input('email');
            $sms->contact = $request->input('contact');
            $sms->message = $request->input('message');
            $sms->save();
            return redirect('/');   

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
            $sms =Sms::find($id);
            $sms->delete();
            return redirect('/sms')->with('success', 'Sms Removed');
        }
        else{
            return view('welcome');
        }
    }
}
