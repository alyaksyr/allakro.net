@extends('admin.layout')

@section('title', 'Toutes les acteurs')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.activites.create')}}" class="btn btn-primary">
        Ajouter une activité
    </a>
</div>

@section('content')


@endsection