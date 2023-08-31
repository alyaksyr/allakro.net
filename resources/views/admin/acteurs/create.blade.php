@extends('admin.layout')

@section('title', $acteur->exists ? 'Editer un acteur' : 'Créer un acteur')


@section('content')

    @include('shared.forms.acteur')

@endsection