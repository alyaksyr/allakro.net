@extends('admin.layout')

@section('title', 'Tous les centres d\'intérêts du quartier')

@section('content')

    @include('admin.interets.table')

    {{$interets->links()}}
@endsection