<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        $data = [
            'post' => $posts
        ];
        return view('guests.post.index', $data); 
    }

    public function show($slug){
        $posts = Post::where('slug', $slug)->first();
        $data = [
            'post' => $posts
        ];
        return view('guests.post.show', $data); 
    }
}
