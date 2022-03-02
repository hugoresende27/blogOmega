<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadPhoto(){
        return view ('auth.uploadphoto');
    }
    public function uploadPhoto_save(Request $request){

        $auth_id = Auth::user()->id;

        if (isset($request->image)){
            $imageName = time().'.'.$request->image->extension();  
            $destination = asset('/profile_pics');
            $request->image->move($destination,$imageName);
        } else {
            $imageName = User::where('id',$auth_id)->first();
            $imageName = $imageName->image;
        }
       
        

        $user = User::where('id',$auth_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'sex' => $request->sex,
                'born' => $request->born,
                'nickname' => $request->nickname,
                'mobile' => $request->phone,
                'image'=>$imageName
            ]);
            
      return redirect ('myprofile')->with('message','Profile Uploaded');
    }

    public function myprofile()
    {
        return view ('users.myprofile');
    }
}
