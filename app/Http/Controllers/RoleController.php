<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $roles = Role::all();
        return view('users.rolepermissions',compact('roles'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'name'=>'required|unique:roles',
        ]);
        Role::create($request->all());
        return redirect()->back()->with('message','Role created Successfully');
    }
  
    public function update(Request $request, $id)
    {
        // dd($request);
        $role = Role::find($id);
        // dd($role->permissions);
        $role->name = $request->input('name');
        $role->permissions = $request->input('permissions');
        $role->save();
        return redirect()->back()->with('message','Role Updated Successfully');
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        $users  = User::where('role_id',$id)->get();
        if(count($users)>0){
            return redirect()->back()->with('message', 'Role Cannot Be Deleted. This Role Is Used By ' .count($users). ' Users. Please Delete Related Users First.');
        }
        else{
            $role->delete();
            return redirect()->back()->with('message', 'Role Has Been Deleted Successfully!');
        }
        
    }
}