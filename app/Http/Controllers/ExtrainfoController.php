<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extrainfo;

class ExtrainfoController extends Controller
{
    public function index(Extrainfo $model)
    {
        return view('users.extrainfo', ['extras' => $model->paginate(10)]);
    }
    
    public function store(Request $request)
    {
        // dd($request);
        Extrainfo::create($request->all());
        return redirect()->back()->with('message','Data Has Been Created !');
    }

    public function update(Request $request, $id)
    {
        $extra = Extrainfo::find($id);
        $extra->update($request->all());
        return redirect()->back()->with('message','Data Has Been Updated !');
    }


    public function destroy($id)
    {
        Extrainfo::find($id)->delete();
        return redirect()->back()->with('message','Data Has Been Deleted !');
    }
}
