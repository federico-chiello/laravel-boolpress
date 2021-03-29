@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('guests.contacts.sent') }}" method="post">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
          </div>
        <div class="form-group">
          <label for="email">Indirizzo Email</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="form-group">
            <label for="message">Messaggio</label>
            <textarea class="form-control" id="message" rows="3" name="message"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection