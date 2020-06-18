<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landlordinfo;
use Illuminate\Support\Facades\Auth;

class LandlordinfoController extends Controller

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
            $landlordinfos = Landlordinfo::orderBy('created_at', 'desc')->paginate(10);
            return view('info.landlordinfo.index')->with('landlordinfos',$landlordinfos);
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
            return view('info.landlordinfo.create');
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
            $landlordinfo = new Landlordinfo;

            $landlordinfo->personalinfo_id = $request->input('personalinfo_id');
            $landlordinfo->prev_landlord_name = $request->input('prev_landlord_name');
            $landlordinfo->prev_landlord_contact = $request->input('prev_landlord_contact');
            $landlordinfo->prev_landloard_address = $request->input('prev_landloard_address');
            $landlordinfo->reason_to_leave = $request->input('reason_to_leave');
            $landlordinfo->pres_landlord_name = $request->input('pres_landlord_name');
            $landlordinfo->pres_landlord_contact = $request->input('pres_landlord_contact');
            $landlordinfo->tenent_since = $request->input('tenent_since');
            $landlordinfo->save();

            return redirect('/personalinfo')->with('success', 'Information Added');   

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
            $landlordinfo = Landlordinfo::find($id);
            return view('info.landlordinfo.edit')->with('landlordinfo',$landlordinfo);
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
            $landlordinfo = Landlordinfo::find($id);

            $landlordinfo->prev_landlord_name = $request->input('prev_landlord_name');
            $landlordinfo->prev_landlord_contact = $request->input('prev_landlord_contact');
            $landlordinfo->prev_landloard_address = $request->input('prev_landloard_address');
            $landlordinfo->reason_to_leave = $request->input('reason_to_leave');
            $landlordinfo->pres_landlord_name = $request->input('pres_landlord_name');
            $landlordinfo->pres_landlord_contact = $request->input('pres_landlord_contact');
            $landlordinfo->tenent_since = $request->input('tenent_since');
            $landlordinfo->save();

            return redirect('/landlordinfo')->with('success', 'Information Updated');   

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
            $landlordinfo = Landlordinfo::find($id);
            $landlordinfo->delete();
            return redirect('/landlordinfo')->with('success', 'Information Removed');
        }
        else{
            return view('welcome'); 
        }
    }
}
