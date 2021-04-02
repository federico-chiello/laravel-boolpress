@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
          Dati utente
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{ Auth::user()->name }}</li>
          <li class="list-group-item">{{ Auth::user()->email }}</li>
          <li class="list-group-item">Token</li>
        </ul>
    </div>
</div>
@endsection


