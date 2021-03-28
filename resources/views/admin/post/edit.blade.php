@extends('layouts.app')
    
@section('content')
<div class="container">
    <form action="{{route('post.update', $post)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
          <label for="inputContent">Content</label>
          <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <p>Seleziona i tag:</p>
            <label for="tags">Tags</label>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
</div>
@endsection