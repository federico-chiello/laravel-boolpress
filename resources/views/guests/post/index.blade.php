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
        <p class="card-text">iv class="card-header">{{ $posts->content }}</p>
        <a href="#" class="btn btn-primary">Dettagli</a>
      </div>
    </div>
  @endforeach
</div>
@endsection