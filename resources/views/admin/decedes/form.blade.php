
@extends('admin.layout')

@section('title', $decede->exists ? 'Editer une déclaration de décès' : 'Créer une déclaration de décès')


@section('content')

<form action="{{route($decede->exists ? 'admin.decedes.update' : 'admin.decedes.store', $decede)}}" method="post">

    @csrf 
    @method($decede->exists ? 'put':'post')

    <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Nom et prénoms du décédé', 'name' => 'nom', 'type' => 'text', 'value' => $decede->nom])
        </div>
        <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Fonction du décédé', 'name' => 'profession', 'type' => 'text', 'value' => $decede->profession])
            <div class="col row">
            @include('shared.input', ['class' => 'col', 'label' => 'Date de naissance', 'name' => 'datenais', 'type' => 'date', 'value' => $decede->datenais])
            </div>
            <div class="col row">
                @include('shared.select', [
                    'class' => 'col',
                    'default' => 'Choisir le genre',
                    'label' => 'Sexe du décédé',
                    'name' => 'genre', 
                    'options' => ['M'=>'Masculin', 'F'=>'Féminin'], 
                    'value' => $decede->genre
                ])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col','label' => 'Date du décès', 'name' => 'datedeces', 'type' => 'date', 'value' => $decede->datedeces])
            <div class="col row">
                @include('shared.input', ['class' => 'col','label' => 'Lieu de décès', 'name' => 'lieu', 'type' => 'text', 'value' => $decede->lieu])
            </div>
            <div class="col row">
                @include('shared.input', ['class' => 'col','label' => 'Cause du décès', 'name' => 'motif', 'type' => 'text', 'value' => $decede->motif])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Nom du parent', 'name' => 'referant', 'type' => 'text', 'value' => $decede->referant])
            <div class="col row">
                @include('shared.input', ['class' => 'col','label' => 'Contact du parent', 'name' => 'contact', 'type' => 'text', 'value' => $decede->contact])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Adresse des parents', 'name' => 'address', 'type' => 'textarea', 'value' => $decede->address])
        </div>
        <div>
            <button class="btn btn-primary">
                @if($decede->exists)
                    Modifer
                @else
                    Créer
                @endif
            </button>
        </div>
</form>

@endsection