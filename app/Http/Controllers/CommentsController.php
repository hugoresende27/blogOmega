<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $post = Post::where('id',$id)->first();
        // dd(get_defined_vars());
        return view('comments.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        // $this->validate($request,[
        //     'comment' => 'required|unique:posts',
        // ],
        // [
        //     'comment.required' => 'Say something!!'
        // ]);

        $user_id = Auth::user()->id;
        // dd(get_defined_vars());
        $comment = Comment::create([
                'comment'=>$request->comment,
                'post_id'=>$request->post_id,
                'user_id'=>$user_id
        ]);
        // dd(get_defined_vars());
        return redirect('/blog')->with('message','Comment Added');
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
        $comment = Comment::where('user_id', $id)->first();
        // $post = $comment->post->title;
        // dd(get_defined_vars());
        return view ('comments.edit',compact('comment'));
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
        $user_id = Auth::user()->id;
        // dd(get_defined_vars());

        
        $comment = Comment::where('id',$id)->update([
                'comment'=>$request->comment,
                'post_id'=>$request->post_id,
                'user_id'=>$user_id
        ]);
        // dd(get_defined_vars());
        return redirect('/blog')->with('message','Comment Updated');
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
        $c = Comment::where('id', $id);
        $c->delete();

        return redirect('/blog')->with ('message', 'Comment deleted');
    }
}
