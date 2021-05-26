<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Family;

class FamilyController extends Controller
{

    public function index(Family $model)
    {
        return view('users.family', ['familys' => $model->paginate(10)]);
    }

    
    public function store(Request $request)
    {
        // dd($request);
        Family::create($request->all());
        
        return redirect()->back()->with('message','Family Created!');
    }
   
    public function update(Request $request, $id)
    {
        $family = Family::find($id);
        $family->update($request->all());
        return redirect()->back()->with('message','Family Updated!');
    }


    public function destroy($id)
    {
        Family::find($id)->delete();
        return redirect()->back()->with('message','Family Deleted!');
    }
}
