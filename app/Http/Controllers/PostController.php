<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::paginate(2);
        return view('posts.post', ['posts' => $posts]);

    }
    public function store(Request $request){
            $this->validate($request, [
                'body' => 'required'
            ]); 
           $request->user()->posts()->create( $request->only('body')
           );
           return back();
    }
}
