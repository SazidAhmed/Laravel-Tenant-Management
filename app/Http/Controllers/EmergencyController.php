<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emergency;

class EmergencyController extends Controller
{
    
    public function index(Emergency $model)
    {
        return view('users.emergency', ['emergencys' => $model->paginate(10)]);
    }

    public function store(Request $request)
    {
        // dd($request);
        Emergency::create($request->all());
        
        return redirect()->back()->with('message','Data Has Been Created!');
    }
   
    public function update(Request $request, $id)
    {
        $emergency = Emergency::find($id);
        $emergency->update($request->all());
        return redirect()->back()->with('message','Data Has Been Updated!');
    }


    public function destroy($id)
    {
        Emergency::find($id)->delete();
        return redirect()->back()->with('message','Data Has Been Deleted!');
    }
}
