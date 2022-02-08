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
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid(). '-' . $request->title.'-'.$request->image->extension();
        //dd($newImageName);

        $request->image->move(public_path('images'), $newImageName);

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        //dd($request);

        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>$slug,
            'image_path'=>$newImageName,
            'user_id'=>auth()->user()->id
        ]);

        return redirect('/blog')->with('message','Post adicionado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
