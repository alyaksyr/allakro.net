@extends('pages.layout')

@section('title', 'Se connecter')


@section('content')

    <div class="mt-4 container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>
                            @yield('title')
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post" class="vstack gap">
                            @csrf

                            @include('shared.input', ['class' => 'col', 'name' => 'email', 'type' => 'email', 'label' =>'Adresse email'])
                            @include('shared.input', ['class' => 'col', 'name' => 'password', 'type' => 'password', 'label' => 'Mo de passe'])
                            <button class="btn btn-primary">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection