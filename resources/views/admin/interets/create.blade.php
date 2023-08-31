@extends('admin.layout')

@section('title', $interet->exists ? 'Editer un centre d\'intérêt' : 'Créer un centre d\'intérêt')


@section('content')

    @include('shared.forms.interet')

@endsection