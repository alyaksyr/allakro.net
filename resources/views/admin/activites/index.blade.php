@extends('admin.layout')

@section('title', 'Toutes les activités du quartier')

@section('content')

    @include('admin.activites.table')

    {{$activites->links()}}
@endsection
