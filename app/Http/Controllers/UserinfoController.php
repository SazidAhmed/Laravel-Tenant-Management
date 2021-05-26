<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Userinfo;
use Illuminate\Support\Facades\File;

class UserinfoController extends Controller
{

    public function index(Userinfo $model)
    {
        return view('users.userinfo', ['infos' => $model->paginate(10)]);
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'image'=>'required|mimes:jpeg,jpg,png'
        ]);
        
        $data = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img =  $data['name'] . time() . '.' . $data['image']->getClientOriginalExtension();
            //$request->image->move(public_path('/../../bendsta-v7/profile'),$img);
            $request->image->move(public_path(env('REL_PUB_FOLD').'profile'),$img);
        }else{
            $img = 'avatar.png';
        }
        
        $data['image']=$image;
      
        Userinfo::create($data);

        return redirect()->back()->with('message', 'Data Has Been Added Successfully!');

    }

    public function update(Request $request, $id)
    {
        $info = Userinfo::find($id);
        $data = $request->all();
        
         //image update
         if($request->hasFile('image')){
            $this->validate($request,[
                'image'=>'required|mimes:jpeg,jpg,png',
            ]);
            $image = $request->file('image');
            $img =  $data['name'] . time() . '.' . $data['image']->getClientOriginalExtension();

            $request->image->move(public_path(env('REL_PUB_FOLD').'profile'),$img);
            $image_path = public_path(env('REL_PUB_FOLD').'profile')."/".$info->image;  
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            
            $data['image']=$img;
        }else{
            $image = $user->image;
            $data['image']= $image;
        }

        $info->update($data);
        return redirect()->back()->with('message', 'Information Has Been Updated Successfully!');
    }

    public function destroy($id)
    {
        $info = Userinfo::find($id);
        $info->delete();
        \Storage::delete('public/profile/'.$info->image); 
        return redirect()->back()->with('message', 'Data Has Been Deleted Successfully!');
    }
}
