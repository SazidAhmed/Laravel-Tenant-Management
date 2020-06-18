<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emergcontact;
use Illuminate\Support\Facades\Auth;
class EmergcontactController extends Controller

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
        if(Auth::user()->role_id =='1'){
            $emergcontacts = Emergcontact::orderBy('created_at', 'desc')->paginate(10);
            return view('info.emergcontact.index')->with('emergcontacts',$emergcontacts);    
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
        if(Auth::user()->role_id =='1'){
            return view('info.emergcontact.create');
        }
        else{
            return view('welcome'); 
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
        
            //Create Post
            $emergcontact = new Emergcontact;
            $emergcontact->personalinfo_id = $request->input('personalinfo_id');
            $emergcontact->emerg_name = $request->input('emerg_name');
            $emergcontact->emerg_relation = $request->input('emerg_relation');
            $emergcontact->emerg_address = $request->input('emerg_address');
            $emergcontact->emerg_contact = $request->input('emerg_contact');
            $emergcontact->save();

            return redirect('/emergcontact')->with('success', 'Information Added');   

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
            $emergcontact = Emergcontact::find($id);
            return view('info.emergcontact.edit')->with('emergcontact',$emergcontact);
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
            //Update Information
            $emergcontact = Emergcontact::find($id);

            $emergcontact->emerg_name = $request->input('emerg_name');
            $emergcontact->emerg_relation = $request->input('emerg_relation');
            $emergcontact->emerg_address = $request->input('emerg_address');
            $emergcontact->emerg_contact = $request->input('emerg_contact');
            $emergcontact->save();

            return redirect('/emergcontact')->with('success', 'Information Updated');   

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
            $emergcontact = Emergcontact::find($id);
            $emergcontact->delete();
            return redirect('/emergcontact')->with('success', 'Information Removed');
        }
        else{
            return view('welcome'); 
        }
    }
}
