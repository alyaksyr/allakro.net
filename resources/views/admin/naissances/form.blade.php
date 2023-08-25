
@extends('admin.layout')

@section('title', $naissance->exists ? 'Editer une déclaration de naissance' : 'Créer une déclaration de naissance')


@section('content')

<form action="{{route($naissance->exists ? 'admin.naissances.update' : 'admin.naissances.store', $naissance)}}" method="post">

    @csrf 
    @method($naissance->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Nom et prénoms du bébé', 'name' => 'nom', 'type' => 'text', 'value' => $naissance->nom])
    </div>
    <div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Lieu de naissance', 'name' => 'lieunais', 'type' => 'text', 'value' => $naissance->lieunais])
        <div class="col row">
        @include('shared.input', ['class' => 'col', 'label' => 'Date de naissance', 'name' => 'datenais', 'type' => 'date', 'value' => $naissance->datenais])
        </div>
        <div class="col row">
            @include('shared.select', [
                'default' => 'Choisir le genre du bébé',
                'class' => 'col',
                'label' => 'Sexe du bébé',
                'name' => 'genre', 
                'options'=>['M'=>'Masculin', 'F'=>'Féminin'], 
                'value' => $naissance->genre
            ])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col','label' => 'Nom du père', 'name' => 'pere', 'type' => 'texte', 'value' => $naissance->pere])
        <div class="col row">
            @include('shared.input', ['class' => 'col','label' => 'Nom de la mère', 'name' => 'mere', 'type' => 'texte', 'value' => $naissance->mere])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Adresse des parents', 'name' => 'address', 'type' => 'text', 'value' => $naissance->address])
        <div class="col row">
            @include('shared.input', ['class' => 'col','label' => 'Contact des parents', 'name' => 'contact', 'type' => 'texte', 'value' => $naissance->contact])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Mode de naissance', 'name' => 'mode', 'type' => 'text', 'value' => $naissance->mode])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($naissance->exists)
                Modifer
            @else
                Créer
            @endif
        </button>
    </div>
</form>

@endsection