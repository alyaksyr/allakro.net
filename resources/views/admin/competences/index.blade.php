@extends('admin.layout')

@section('title', 'Toutes les compétences du quartier')

@section('content')

    @include('admin.competences.table')

    {{$competences->links()}}
@endsection
