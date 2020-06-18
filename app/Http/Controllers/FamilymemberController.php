<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familymember;
use Illuminate\Support\Facades\Auth;

class FamilymemberController extends Controller

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
            $familymembers = Familymember::orderBy('created_at', 'desc')->paginate(10);
            return view('info.familymember.index')->with('familymembers',$familymembers);
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
            return view('info.familymember.create');
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
            $familymember = new Familymember;
            $familymember->personalinfo_id = $request->input('personalinfo_id');
            $familymember->family_member_name = $request->input('family_member_name');
            $familymember->family_member_nid = $request->input('family_member_nid');
            $familymember->family_member_relation = $request->input('family_member_relation');
            $familymember->family_member_age = $request->input('family_member_age');
            $familymember->family_member_occupation = $request->input('family_member_occupation');
            $familymember->family_member_contact = $request->input('family_member_contact');
            $familymember->save();

            return redirect('/familymember')->with('success', 'Information Added');   
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
            $familymember = Familymember::find($id);
            return view('info.familymember.edit')->with('familymember',$familymember);
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
            $familymember = Familymember::find($id);

            $familymember->family_member_name = $request->input('family_member_name');
            $familymember->family_member_nid = $request->input('family_member_nid');
            $familymember->family_member_relation = $request->input('family_member_relation');
            $familymember->family_member_age = $request->input('family_member_age');
            $familymember->family_member_occupation = $request->input('family_member_occupation');
            $familymember->family_member_contact = $request->input('family_member_contact');
            $familymember->save();

            return redirect('/familymember')->with('success', 'Information Updated');   
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
            $familymember = Familymember::find($id);
            $familymember->delete();
            return redirect('/familymember')->with('success', 'Information Removed');
        }
        else{
            return view('welcome'); 
        }
    }
}
