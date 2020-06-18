<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maidinfo;
use Illuminate\Support\Facades\Auth;
class MaidinfoController extends Controller

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
            $maidinfos = Maidinfo::orderBy('created_at', 'desc')->paginate(10);
            return view('info.maidinfo.index')->with('maidinfos',$maidinfos);
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
            return view('info.maidinfo.create');
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
            $maidinfo = new Maidinfo;
            
            $maidinfo->personalinfo_id = $request->input('personalinfo_id');
            $maidinfo->maid_name = $request->input('maid_name');
            $maidinfo->maid_nid = $request->input('maid_nid');
            $maidinfo->maid_contact = $request->input('maid_contact');
            $maidinfo->maid_address = $request->input('maid_address');
            $maidinfo->save();

            return redirect('/maidinfo')->with('success', 'Information Added');   

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
            $maidinfo = Maidinfo::find($id);
            return view('info.maidinfo.edit')->with('maidinfo',$maidinfo);
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
            $maidinfo = Maidinfo::find($id);

            $maidinfo->maid_name = $request->input('maid_name');
            $maidinfo->maid_nid = $request->input('maid_nid');
            $maidinfo->maid_contact = $request->input('maid_contact');
            $maidinfo->maid_address = $request->input('maid_address');
            $maidinfo->save();

            return redirect('/maidinfo')->with('success', 'Information Updated');   

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
            $maidinfo = Maidinfo::find($id);
            $maidinfo->delete();
            return redirect('/maidinfo')->with('success', 'Information Removed');
        }
        else{
            return view('welcome'); 
        }
    }
}
