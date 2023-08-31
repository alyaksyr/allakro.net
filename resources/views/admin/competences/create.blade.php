@extends('admin.layout')

@section('title', $competence->exists ? 'Editer la compétence' : 'Ajouter une compétence')


@section('content')
    
    @include('shared.forms.competence')

@endsection