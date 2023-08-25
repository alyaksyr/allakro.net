@extends('admin.layout')

@section('title', $acteur->exists ? 'Editer un acteur' : 'Créer un acteur')


@section('content')
<div class="container">
    @include('admin.acteurs.form')
</div>
@endsection