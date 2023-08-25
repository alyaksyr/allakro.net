@extends('admin.layout')

@section('title', $amenage->exists ? 'Editer une déclaration d\'aménagement' : 'Nouvelle déclaration d\'aménagement')


@section('content')
<div class="container">
    <form action="{{route($amenage->exists ? 'admin.amenages.update' : 'admin.amenages.store', $amenage)}}" method="post">

        @csrf 
        @method($amenage->exists ? 'put':'post')

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Nom et prénoms de l\'aménagé', 'name' => 'nom', 'type' => 'text', 'value' => $amenage->nom])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Date de naissance', 'name' => 'datenais', 'type' => 'date', 'value' => $amenage->datenais])
            </div>
            <div class="col row">
                @include('shared.select', [
                    'class' => 'col',
                    'default'=>'Choisir le genre',
                    'label' => 'Sexe de l\'aménagé',
                    'name' => 'genre', 
                    'options'=>['M'=>'Masculin', 'F'=>'Féminin'], 
                    'value' => $amenage->genre])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col','label' => 'Fonction du déménagé', 'name' => 'profession', 'type' => 'text', 'value' => $amenage->profession])
            <div class="col row">
                @include('shared.input', ['class' => 'col','label' => 'Contact de l\'aménagé', 'name' => 'contact', 'type' => 'text', 'value' => $amenage->contact])
            </div>
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Date d\'aménagement', 'name' => 'datearrive', 'type' => 'date', 'value' => $amenage->datearrive])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Provenance de l\'aménagé', 'name' => 'provenance', 'type' => 'text', 'value' => $amenage->provenance])
            <div class="col row">
                @include('shared.select', [
                    'class' => 'col',
                    'default' => 'Choisir un mode d\'hébergement',
                    'label' => 'Mode d\'hébergement',
                    'name' => 'mode', 
                    'options'=>['Nouvelle habitation', 'Chez un tuteur'], 
                    'value' => $amenage->mode
                    ])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Adresse du déménagé', 'name' => 'address', 'type' => 'textarea', 'value' => $amenage->address])
        </div>
        <div>
            <button class="btn btn-primary">
                @if($amenage->exists)
                    Modifer
                @else
                    Enrégister
                @endif
            </button>
        </div>
    </form>
</div>
@endsection