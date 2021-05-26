<?php

namespace App\Http\Controllers;

use App\User;
use App\Payment;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'username'=>'required|string|unique:users',
            'password'=>'required|string|min:6|',
            'role_id'=>'required',
            'mobile'=>'required|numeric',
        ]);

        // dd($request->all());

        $user = new User;
        $user->role_id = $request->input('role_id');
        $user->username = $request->input('username');
        $user->mobile = $request->input('mobile');
        $user->password=Hash::make($request->input('password'));
        // dd($request->all());
        $user->save();
        return redirect()->back()->with('message','User created Successfully');

    }

    public function update(Request $request, $id)
    {
        //  dd($request->all());
        $data = $request->all();
        $user = User::find($id);
        if($user->username==$data['username']){
            $this->validate($request,[
                'username'=>'required|string|max:255',
                'mobile'=>'required|numeric',
            ]);
        }else{
            $this->validate($request,[
                'username'=>'required|string|max:255|unique:users',
                'mobile'=>'required|numeric',
            ]);

        }
        //password update
        if($request->password){
            $password = $request->password;
            $data['password']= bcrypt($password);
        }else{
            $password = $user->password;
            $data['password']= $password;
        }
        // dd($request->all());
        $user->update($data);
        return redirect()->back()->with('message','User Updated Successfully');
    }


    public function destroy($id)
    {
        $user  = User::find($id);

        $payments  = Payment::where('user_id',$id)->get();
        // dd(count($payments));
        if(count($payments)>0){
            return redirect()->back()->with('message', 'User Cannot Be Deleted. This User Has ' .count($payments). ' Payments. Please Delete Related Payments First.');
        }
        else{
            $user->delete();
            return redirect()->back()->with('message', 'User Has Been Deleted Successfully!');
        }
       
    }
}
 