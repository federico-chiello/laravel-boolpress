@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>User ID</th>
        <th>Content</th>
        <th>Image</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->user_id }}</td>
            <td>{{ $post->content }}</td>
            <td><img src="{{asset('storage/'.$post->cover)}}" alt="{{ $post->title }}"></td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
          </tr>
    </tbody>
  </table>
@endsection