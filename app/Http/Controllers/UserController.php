<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadPhoto(){

        $countries = Country::all();
        $message = null;
        if (Auth::user()->image == null) $message = "Upload your profile photo !";
        // dd(get_defined_vars());
        return view ('auth.uploadphoto', compact ('countries','message'));
    }
    public function uploadPhoto_save(Request $request){

        $auth_id = Auth::user()->id;

        if (isset($request->image))
        {
            // $imageName = time().'.'.$request->image->extension();  
            // $destination = public_path('profile_pics');
            // $request->image->move($destination,$imageName);

    //////////////////////////////////////////////////////////////////////////
       
              
        //the upload method handles the uploading of the file and can accept attributes to define what should happen to the image

        //Also note you could set a default height for all the images and Cloudinary does a good job of handling and rendering the image.
                Cloudder::upload($request->file('image'), null, array(
                    "folder" => "omega",  "overwrite" => FALSE,
                    "resource_type" => "image", "responsive" => TRUE, "transformation" => array("quality" => "100", "crop" => "scale")
                ));
                    $public_id = Cloudder::getPublicId();

                    $width = 400;
                    $height = 400;

                    $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height, "crop" => "scale", "quality" => 70, "secure" => "true"]);
            // }
  //////////////////////////////////////////////////////////////////////////
           
                // dd(get_defined_vars());
  //////////////////////////////////////////////////////////////////////////

        } 
        else 
        {
            $image_url = User::where('id',$auth_id)->first();
            $image_url = $image_url->image;
        }
       
       
        
        $user = User::where('id',$auth_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'sex' => $request->sex,
                'born' => $request->born,
                'nickname' => $request->nickname,
                'mobile' => $request->phone,
                'country' => $request->country,
                'details' => $request->details,
                'image'=>$image_url
            ]);

           
      return redirect ('profile/'.$auth_id)->with('message','Profile Uploaded');
    }

    // public function myprofile()
    // {
    //     return view ('users.myprofile');
    // }

    public function profile( $id)
    {
        $user = User::where('id',$id)->get();
        $curr_year = now();
        foreach($user as $u){
            $data = new \DateTime($u->born);
        }

        $age = $data->diff($curr_year)->format("%y");
       
        // dd(get_defined_vars());
        return view ('users.profile', compact('user','age'));
    }

    
}
