<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
class NoticeCOntroller extends Controller
{
    public function index(Notice $model)
    {
       return view('users.notice', ['notices' => $model->paginate(10)]);
    }

    public function create()
    {
        $notices = Notice::orderBy('created_at', 'desc')->paginate(10);
      
        return view('users.notice',compact('notices'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'date'=>'required',
            'name'=>'required'
        ]);
        Notice::create($request->all());
        return redirect()->route('notices.create')->with('message','Notice created Successfully');
    }


    public function update(Request $request, $id)
    {
        $notice = Notice::find($id);
        $notice->update($request->all());
        return redirect()->route('notices.create')->with('message','Notice created Successfully');
    }

    public function destroy($id)
    {
        Notice::find($id)->delete();
        return redirect()->route('notices.create')->with('message','Notice deleted Successfully');
    }
}
