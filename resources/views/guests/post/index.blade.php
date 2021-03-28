@extends('layouts.app')

@section('title', 'elenco post')
    
@section('content')
<h1>Elenco dei post</h1>
<div class="container">
  @foreach ($post as $posts)
    <div class="card">
      <div class="card-header">
        {{ $posts->title }}
      </div>
      <div class="card-body">
        <p class="card-text">{{ $posts->content }}</p>
        <p class="card-text">{{ $posts->user->name }}</p>
        <a href="{{ route('guests.posts.show', $posts->slug) }}" class="btn btn-primary">Dettagli</a>
      </div>
    </div>
  @endforeach
</div>
@endsection