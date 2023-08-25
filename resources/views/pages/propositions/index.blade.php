@extends('pages.layout')

@section('title', 'Toutes les annonces')
@section('content')
<div class="card mb-3" style="min-width: 400px; cursor:pointer;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset('images/avatar2.png')}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Titre annonce</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

@endsection