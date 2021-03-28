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
}
