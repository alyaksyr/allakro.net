
@extends('admin.layout')

@section('title', $demenage->exists ? 'Editer une déclaration' : 'Nouvelle déclaration')


@section('content')

<form action="{{route($demenage->exists ? 'admin.demenages.update' : 'admin.demenages.store', $demenage)}}" method="post">

    @csrf 
    @method($demenage->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Nom et prénoms du déménagé', 'name' => 'nom', 'type' => 'text', 'value' => $demenage->nom])
        <div class="col row">
            @include('shared.input', ['class' => 'col', 'label' => 'Date de naissance', 'name' => 'datenais', 'type' => 'date', 'value' => $demenage->datenais])
        </div>
        <div class="col row">
            @include('shared.select', [
                'class' => 'col',
                'default' => 'Choisir le genre',
                'label' => 'Sexe du déménagé',
                'name' => 'genre', 
                'options'=>['M'=>'Masculin', 'F'=>'Féminin'], 
                'value' => $demenage->genre
            ])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col','label' => 'Fonction du déménagé', 'name' => 'profession', 'type' => 'texte', 'value' => $demenage->profession])
        <div class="col row">
            @include('shared.input', ['class' => 'col','label' => 'Contact du déménagé', 'name' => 'contact', 'type' => 'texte', 'value' => $demenage->contact])
        </div>
        <div class="col row">
            @include('shared.input', ['class' => 'col', 'label' => 'Date de déménagement', 'name' => 'depart', 'type' => 'date', 'value' => $demenage->depart])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col','label' => 'Nouvelle destination', 'name' => 'destination', 'type' => 'texte', 'value' => $demenage->destination])
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Adresse du déménagé', 'name' => 'address', 'type' => 'textarea', 'value' => $demenage->address])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($demenage->exists)
                Modifer
            @else
                Enrégister
            @endif
        </button>
    </div>
</form>
@endsection
