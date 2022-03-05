<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::all()->first();
        //dd($posts->description);
        return view('index')->with('post', $posts);
        // return view('index')->with('post', Post::where('slug', $slug)->first());
    }

    public function about()
    {
        
    }

    public function cinema()
    {
        return view ('cinema.index');
    }
}
