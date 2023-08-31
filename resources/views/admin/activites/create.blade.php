
@extends('admin.layout')

@section('title', $activite->exists ? 'Editer une activité' : 'Ajouter une activité')

@section('content')

    @include('shared.forms.activite')

@endsection