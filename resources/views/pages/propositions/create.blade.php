
@extends('pages.layout')

@section('title', 'Proposer un service')

@section('content')
<div class="row justify-content-center">
    <div class="col-9 col-content">
        <span class="d-block p-2 my-2 bg-light">
            <h4>@yield('title')</h4>
        </span>
        @include('shared.forms.proposition')
    </div>
    <div class="col-3 col-aside"></div>
</div>
@endsection