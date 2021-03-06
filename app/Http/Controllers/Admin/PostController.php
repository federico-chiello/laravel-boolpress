<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $data = [
            'post' => $posts
        ];
        return view('admin.post.index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        $data = [
            'tag' => $tags
        ];
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $userId = Auth::id();


        $newPost = new Post();
        $newPost->user_id = $userId;
        $newPost->slug = Str::slug($data['title']);
        $pathCover = Storage::put('post_cover', $data['image']);
        $data['cover'] = $pathCover;
        $newPost->cover = $data['cover'];

        $newPost->fill($data);

        $newPost->save();
        if(array_key_exists('tag', $data)){
            $newPost->tags()->sync($data['tag']);
        }
    
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'post' => $post
        ];

        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();

        $data = [
            'post' => $post,
            'tag' => $tags
        ];

        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        if($data['title'] != $post->title){
            $slug = Str::slug($data['title']);
            $data['slug'] = $slug;
        }
        
        if(array_key_exists('image', $data)){
            $pathCover = Storage::put('post_cover', $data['image']);
            $data['cover'] = $pathCover;
        }
        
        if(array_key_exists('tag', $data)){
            $post->tags()->sync($data['tag']);
        }

        $post->update($data);
        return redirect()->route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('post.index');
    }
}
