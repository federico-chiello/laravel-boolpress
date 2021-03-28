@extends('layouts.app')
    
@section('content')
<h1>Scrivi un nuovo post</h1>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<div class="container">
    <form action="{{route('post.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="inputTitle">Title</label>
          <input type="text" class="form-control" id="inputTitle" name="title">
        </div>
        <div class="form-group">
          <label for="inputContent">Content</label>
          <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection