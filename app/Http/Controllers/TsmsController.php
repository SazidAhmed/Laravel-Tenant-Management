<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tsms;
use Illuminate\Support\Facades\Auth;
class TsmsController extends Controller
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
        if(Auth::user()->role_id=='2'){
            $tsmss = Tsms::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            return view('tsms.index',['role_id'=>Auth::user()->role_id])->with('tsmss',$tsmss);
        }
        else{
            $tsmss = Tsms::orderBy('created_at', 'desc')->paginate(5);
            return view('tsms.index',['role_id'=>Auth::user()->role_id])->with('tsmss',$tsmss);  
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tsms.create');
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
            'user_id' => 'required',
            'status' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);
            //Create notice
            $tsms = new Tsms;
            $tsms->user_id = $request->input('user_id');
            $tsms->status = $request->input('status');
            $tsms->title = $request->input('title');
            $tsms->body = $request->input('body');
            $tsms->save();
            return redirect('/tsms')->with('success', 'Message has been Sent');
    }

    /**
     * Show the form for editing the specified resource.
     *if(Auth::user()->id == $tsms->user_id)
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $tsms = Tsms::find($id);
        if(Auth::user()->id == $tsms->user_id){
            return view('tsms.edit')->with('tsms',$tsms);
        }
        if(Auth::user()->role_id =='1'){
            return view('tsms.edit')->with('tsms',$tsms);
        }

        else{
            return view('welcome');
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
        $validatedData = $request->validate([
            'user_id' => 'required',
            'status' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);
        //Update Tsms
            $tsms = Tsms::find($id);
            $tsms->user_id = $request->input('user_id');
            $tsms->status = $request->input('status');
            $tsms->title = $request->input('title');
            $tsms->body = $request->input('body');
            $tsms->save();
            return redirect('/tsms')->with('success', 'Message Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tsms =Tsms::find($id);
        if(Auth::user()->role_id =='1'){
            $tsms->delete();
            return redirect('/tsms')->with('success', 'Message Removed');
        }
        else{
            return view('welcome');
        }
    }
}
