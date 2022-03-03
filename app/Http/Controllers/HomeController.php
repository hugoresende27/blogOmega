<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $results1 = User::query()
            ->where('first_name', 'LIKE', "%{$search}%")
            // ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();
        $results2 = User::query()
            ->where('last_name', 'LIKE', "%{$search}%")
            // ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();
        $results3 = Post::query()
            ->where('title', 'LIKE', "%{$search}%")        
            ->get();
        

        $collection = collect([$results1,$results2,$results3]);
        $count = 0;
        foreach ($collection as $item) {
            $count += count($item);
        }
       
       
        // dd(get_defined_vars());
        // Return the search view with the resluts compacted
        return view('blog.search', compact('collection','count'));
    }
}
