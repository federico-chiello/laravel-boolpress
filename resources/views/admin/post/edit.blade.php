@extends('layouts.app')
    
@section('content')
<div class="container">
    <form action="{{route('post.update', $post)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $post->title }}">
        </div>
        @if ($post->cover)
        <p>Immagine:</p>
        <img src="{{asset('storage/'.$post->cover)}}" alt="{{ $post->title }}">
          @else
            <p>Immagine non presente</p>  
        @endif
        <div class="form-group">
          <label for="image">Scegli l'immagine</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
          <label for="inputContent">Content</label>
          <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
        </div>
        @foreach ($tag as $tags)
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tag[]" value="{{ $tags->id }}" {{ $post->tags->contains($tags->id) ? 'checked' : '' }}>
          <label class="form-check-label" for="exampleCheck1">{{ $tags->name }}</label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Salva</button>
      </form>
</div>
@endsection