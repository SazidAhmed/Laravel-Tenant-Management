<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Personalinfo;
use Illuminate\Support\Facades\Auth;
use DB;

class PersonalinfoController extends Controller
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
            $personalinfos = Personalinfo::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
            return view('info.personalinfo.index',['role_id'=>Auth::user()->role_id])->with('personalinfos',$personalinfos);
        }
        else{
            $personalinfos = Personalinfo::orderBy('created_at', 'desc')->paginate(10);
            return view('info.personalinfo.index',['role_id'=>Auth::user()->role_id])->with('personalinfos',$personalinfos);  
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
            return view('info.personalinfo.create');
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
            $personalinfo = new Personalinfo;
            $personalinfo->floor = $request->input('floor');
            $personalinfo->user_id = $request->input('user_id');
            $personalinfo->person_name = $request->input('person_name');
            $personalinfo->father_name = $request->input('father_name');
            $personalinfo->date_of_birth = $request->input('date_of_birth');
            $personalinfo->marital_status = $request->input('marital_status');
            $personalinfo->permanent_address = $request->input('permanent_address');
            $personalinfo->occupation = $request->input('occupation');
            $personalinfo->office_address = $request->input('office_address');
            $personalinfo->religion = $request->input('religion');
            $personalinfo->edu_qualification = $request->input('edu_qualification');
            $personalinfo->contact = $request->input('contact');
            $personalinfo->email = $request->input('email');
            $personalinfo->nid = $request->input('nid');
            $personalinfo->passport_no = $request->input('passport_no');
            $personalinfo->save();

            return redirect('/familymember/create')->with('success', 'Information Added');   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personalinfo = Personalinfo::find($id);
        if(Auth::user()->role_id =='1'){
            $familymember = Personalinfo::find($personalinfo->id)->familymember;
            $emergcontact = Personalinfo::find($personalinfo->id)->emergcontact;
            $maidinfo = Personalinfo::find($personalinfo->id)->maidinfo;
            $driverinfo = Personalinfo::find($personalinfo->id)->driverinfo;
            $landlordinfo = Personalinfo::find($personalinfo->id)->landlordinfo;
            
            return view('info.personalinfo.show')
            ->with('personalinfo',$personalinfo)
            ->with('familymember',$familymember)
            ->with('emergcontact',$emergcontact)
            ->with('maidinfo',$maidinfo)
            ->with('driverinfo',$driverinfo)
            ->with('landlordinfo',$landlordinfo);
        }
        else
        {
            if(Auth::user()->id == $personalinfo->user_id){
            $familymember = Personalinfo::find($personalinfo->id)->familymember;
            $emergcontact = Personalinfo::find($personalinfo->id)->emergcontact;
            $maidinfo = Personalinfo::find($personalinfo->id)->maidinfo;
            $driverinfo = Personalinfo::find($personalinfo->id)->driverinfo;
            $landlordinfo = Personalinfo::find($personalinfo->id)->landlordinfo;
            
            return view('info.personalinfo.show')
            ->with('personalinfo',$personalinfo)
            ->with('familymember',$familymember)
            ->with('emergcontact',$emergcontact)
            ->with('maidinfo',$maidinfo)
            ->with('driverinfo',$driverinfo)
            ->with('landlordinfo',$landlordinfo);
            }
            else{
                return view('welcome'); 
            }
        }
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
            $personalinfo = Personalinfo::find($id);
            return view('info.personalinfo.edit')->with('personalinfo',$personalinfo);
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
            $personalinfo = Personalinfo::find($id);
            $personalinfo->floor = $request->input('floor');
            $personalinfo->person_name = $request->input('person_name');
            $personalinfo->father_name = $request->input('father_name');
            $personalinfo->date_of_birth = $request->input('date_of_birth');
            $personalinfo->marital_status = $request->input('marital_status');
            $personalinfo->permanent_address = $request->input('permanent_address');
            $personalinfo->occupation = $request->input('occupation');
            $personalinfo->office_address = $request->input('office_address');
            $personalinfo->religion = $request->input('religion');
            $personalinfo->edu_qualification = $request->input('edu_qualification');
            $personalinfo->contact = $request->input('contact');
            $personalinfo->email = $request->input('email');
            $personalinfo->nid = $request->input('nid');
            $personalinfo->passport_no = $request->input('passport_no');
            $personalinfo->save();

            return redirect('/personalinfo')->with('success', 'Information Updated');
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
            $personalinfo = Personalinfo::find($id);
            $personalinfo->delete();
            return redirect('/personalinfo')->with('success', 'Information Removed');
        }
        else{
            return view('welcome'); 
        }
    }
}