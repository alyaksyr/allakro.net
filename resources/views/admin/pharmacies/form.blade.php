
@extends('admin.layout')

@section('title', $pharmacie->exists ? 'Editer une pharmacie' : 'Créer une pharmacie')

@section('content')

<form action="{{route($pharmacie->exists ? 'admin.pharmacies.update' : 'admin.pharmacies.store', $pharmacie)}}" method="post">

    @csrf 
    @method($pharmacie->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Nom de la pharmacie', 'name' => 'nom', 'type' => 'text', 'value' => $pharmacie->nom])
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Contact', 'name' => 'contact', 'type' => 'text', 'value' => $pharmacie->contact])
        <div class="col row">
            @include('shared.input', ['class' => 'col', 'label' => 'Nom du pharmacien', 'name' => 'responsable', 'type' => 'text', 'value' => $pharmacie->responsable])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Situation de la pharmacie', 'name' => 'address', 'type' => 'textarea', 'value' => $pharmacie->address])
    </div>
    <div class="row">
        @include('shared.select', ['class' => 'col','label' => 'Bons acceptés','name' => 'bons', 'options' => $bons, 'value' => $pharmacie->bons()->pluck('id'), 'multiple'=>true])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($pharmacie->exists)
                Modifer
            @else
                Créer
            @endif
        </button>
    </div>
</form>
@endsection