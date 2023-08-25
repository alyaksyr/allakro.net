
@extends('admin.layout')

@section('title', $bon->exists ? 'Editer un bon médical' : 'Créer un bon médical')


@section('content')

<form action="{{route($bon->exists ? 'admin.bons.update' : 'admin.bons.store', $bon)}}" method="post">

    @csrf 
    @method($bon->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Nom du bon', 'name' => 'libelle', 'type' => 'text', 'value' => $bon->libelle])
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Détail du bon', 'name' => 'detail', 'type' => 'textarea', 'value' => $bon->detail])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($bon->exists)
                Modifer
            @else
                Créer
            @endif
        </button>
    </div>
</form>
@endsection