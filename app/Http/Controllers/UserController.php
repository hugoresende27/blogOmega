<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view ('auth.uploadphoto');
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
                    "resource_type" => "image", "responsive" => TRUE, "transformation" => array("quality" => "70", "width" => "400", "height" => "400", "crop" => "scale")
                ));
                    $public_id = Cloudder::getPublicId();

                    $width = 250;
                    $height = 250;

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
                'image'=>$image_url
            ]);

           
      return redirect ('myprofile')->with('message','Profile Uploaded');
    }

    public function myprofile()
    {
        return view ('users.myprofile');
    }
}
