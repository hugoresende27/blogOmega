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

use Illuminate\Http\Request;

use App\Models\Post;
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
        //$post = Post::all();
        //dd($post);

        return view ('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
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

        if (isset($request->image)){
            $imageName = time().'.'.$request->image->extension();  
            $destination = public_path('/post_pics');
            $request->image->move($destination,$imageName);
        } 

        //$newImageName = uniqid(). '.' .$request->image->extension();
        // $newImageName = time().'.'.$request->image->extension();  
        // //dd($newImageName);

        // $request->image->move(public_path('images'), $newImageName);

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        // dd(get_defined_vars());

        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>$slug,
            'image'=>$imageName,
            'user_id'=>auth()->user()->id
        ]);

        return redirect('/blog')->with('message','Post adicionado');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view ('blog.show')->with('post', Post::where('slug', $slug)->first());
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
            // 'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);


        //$newImageName = time().'.'.$request->image->extension(); 
        //$request->image->move(public_path('images'), $newImageName);
        //dd($request->image);
        Post::where('slug', $slug)
            ->update([
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'slug'=>SlugService::createSlug(Post::class, 'slug', $request->title),
                // 'image_path'=>$newImageName,
                'user_id'=>auth()->user()->id

            ]);
    
        return redirect('/blog')->with ('message', 'O seu post foi atualizado!');
         
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

        return redirect('/blog')->with ('message', 'O seu post foi apagado!');
    }
}
