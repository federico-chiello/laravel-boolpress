@extends('layouts.app')

@section('content')
<div>
    <a class="btn btn-primary" href="{{ route('post.create') }}">Crea un nuovo post</a>
</div>
@if (session('status'))
<div class="alert alert-succes">
    {{ session('status') }}
</div>    
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">User ID</th>
        <th scope="col">Created at</th>
        <th scope="col">Updated at</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($post as $posts)
        <tr>
            <th>{{ $posts->id }}</th>
            <td>{{ $posts->title }}</td>
            <td>{{ $posts->user->name }}</td>
            <td>{{ $posts->created_at }}</td>
            <td>{{ $posts->updated_at }}</td>
            <td><a class="btn btn-primary" href="{{ route('post.show', $posts->id) }}">Vedi</a></td>
            <td><a class="btn btn-warning" href="{{ route('post.edit', $posts->id) }}">Modifica</a></td>
            <td>
              <form action="{{route('post.destroy', $posts)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                  <button class="btn btn-danger" type="submit">Cancella</button>
                </div>
              </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection