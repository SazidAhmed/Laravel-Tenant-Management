<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driverinfo;
use Illuminate\Support\Facades\Auth;
class DriverinfoController extends Controller

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
            $driverinfos = Driverinfo::orderBy('created_at', 'desc')->paginate(10);
            return view('info.driverinfo.index')->with('driverinfos',$driverinfos);
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
            return view('info.driverinfo.create');
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
            $driverinfo = new Driverinfo;

            $driverinfo->personalinfo_id = $request->input('personalinfo_id');
            $driverinfo->driver_name = $request->input('driver_name');
            $driverinfo->driver_nid= $request->input('driver_nid');
            $driverinfo->driver_license= $request->input('driver_license');
            $driverinfo->driver_contact = $request->input('driver_contact');
            $driverinfo->driver_address = $request->input('driver_address');
            $driverinfo->save();

            return redirect('/driverinfo')->with('success', 'Information Added Successfully');   

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
            $driverinfo = Driverinfo::find($id);
            return view('info.driverinfo.edit')->with('driverinfo',$driverinfo);
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
            $driverinfo = Driverinfo::find($id);

            $driverinfo->driver_name = $request->input('driver_name');
            $driverinfo->driver_nid= $request->input('driver_nid');
            $driverinfo->driver_license= $request->input('driver_license');
            $driverinfo->driver_contact = $request->input('driver_contact');
            $driverinfo->driver_address = $request->input('driver_address');
            $driverinfo->save();

            return redirect('/driverinfo')->with('success', 'Information Updated');   

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
            $driverinfo = Driverinfo::find($id);
            $driverinfo->delete();
            return redirect('/driverinfo')->with('success', 'Information Removed');
        }
        else{
            return view('welcome'); 
        }
    }
}
