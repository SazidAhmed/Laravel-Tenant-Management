<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Illuminate\Support\Facades\Auth;
class NoticeController extends Controller
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
        $notices = Notice::orderBy('created_at', 'desc')->paginate(5);
        return view('notice.index')->with('notices', $notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role_id =='1'){
            return view('notice.create');
        }
        else{
            return redirect('/notice')->with('error','unauthorized');
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
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

            //Create notice
            $notice = new Notice;
            $notice->title = $request->input('title');
            $notice->body = $request->input('body');
            $notice->save();
            return redirect('/notice'); 
        
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
            $notice = Notice::find($id);
            return view('notice.edit')->with('notice',$notice);
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
            $notice = Notice::find($id);
            $notice->title = $request->input('title');
            $notice->body = $request->input('body');
            $notice->save();
            return redirect('/notice')->with('success', 'Notice Updated');
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
            $notice =Notice::find($id);
            $notice->delete();
            return redirect('/notice')->with('success', 'Notice Removed');
        }
        else{
            return view('welcome');
        }
    }
}
