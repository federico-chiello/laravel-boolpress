@extends('layouts.app')

@section('title', 'dettaglio post')
    
@section('content')
<h1>Elenco dei post</h1>
<div class="container">
    <div class="card">
      <div class="card-header">
        {{ $post->title }}
      </div>
      <div class="card-body">
        <p class="card-text">{{ $post->content }}</p>
        <p class="card-text">{{ $post->user->name }}</p>
      </div>
    </div>
</div>
@endsection