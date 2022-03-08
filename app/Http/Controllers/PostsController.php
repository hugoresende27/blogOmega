<?php

/*

CREATE --- /blog/create

READ --- /blog/index = /blog

UPDATE -- /blog/{slug} -- PUT or PATCH

DELETE -- /blog/{id}

SHOW -- /blog/{id} -- GET

EDIT -- /blog/{id}/edit -- GET

*/



namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\Comment;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    public function index()
    {
        // $posts = Post::orderBy('updated_at', 'DESC')->get();
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(3);
        $comments = Comment::all();
        
        //dd($post);

        return view ('blog.index',compact('posts','comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            // 'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $image_url = "";
        $x = $request->file('image');
        // dd($x);
        if (isset($request->image))
        {
            //Also note you could set a default height for all the images and Cloudinary does a good job of handling and rendering the image.
            foreach($x as $y)
            {
               
            
                Cloudder::upload($y, null, array(
                    "folder" => "omega",  "overwrite" => FALSE,
                    "resource_type" => "image", "responsive" => TRUE, "transformation" => array("quality" => "100", "crop" => "scale")
                ));
                    $public_id = Cloudder::getPublicId();

                    $width = 400;
                    $height = 400;

                    $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height, "crop" => "scale", "quality" => 70, "secure" => "true"]);

        
            } 
        
        }
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        // dd(get_defined_vars());

        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>$slug,
            'image'=>$image_url,
            'user_id'=>auth()->user()->id
        ]);

        return redirect('/blog')->with('message','Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comments = Comment::all();
        $post = Post::where('slug', $slug)->first();

        return view ('blog.show',compact('comments','post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $request->validate([
            'title'=>'required',
            'description'=>'required',
          
        ]);
        $image_url = "";
        if (isset($request->image)){
            //Also note you could set a default height for all the images and Cloudinary does a good job of handling and rendering the image.
            Cloudder::upload($request->file('image'), null, array(
                "folder" => "omega",  "overwrite" => FALSE,
                "resource_type" => "image", "responsive" => TRUE, "transformation" => array("quality" => "100", "crop" => "scale")
            ));
                $public_id = Cloudder::getPublicId();

                $width = 400;
                $height = 400;

                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height, "crop" => "scale", "quality" => 70, "secure" => "true"]);

            } 
            else 
            {
                // $x = $slug;
                // dd(get_defined_vars());
                $image_url = Post::where('slug',$slug)->first();
                $image_url = $image_url->image;
            }

           

       
        Post::where('slug', $slug)
            ->update([
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'slug'=>SlugService::createSlug(Post::class, 'slug', $request->title),
                'image'=>$image_url,
                'user_id'=>auth()->user()->id

            ]);
    
        return redirect('/blog')->with ('message', 'Post updated!');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')->with ('message', 'Post deleted');
    }
}
