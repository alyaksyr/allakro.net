
@extends('pages.layout')

@section('title', 'Déclarer une naissance')


@section('content')

<form action="{{ route('declaration.store', $naissance) }}" method="post">

    @csrf 
    @method('post')

    <input type="text" id="_user_id" name="_user_id", hidden value="1">
    <input type="text" id="_type" name="_type", hidden value="naissance">
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
                'class' => 'col',
                'default' => 'Choisir le genre',
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
            Déclarer
        </button>
    </div>
</form>

@endsection