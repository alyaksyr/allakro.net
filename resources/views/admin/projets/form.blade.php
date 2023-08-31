@extends('admin.layout')

@section('title', $projet->exists ? 'Editer un projet' : 'Ajouter un projet')

@section('content')

    <form action="{{route($projet->exists ? 'admin.projets.update' : 'admin.projets.store', $projet)}}" method="post">

        @csrf 

        @method($projet->exists ? 'put':'post')



        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Libellé du projet', 'name' => 'libelle', 'type' => 'text', 'value' => $projet->libelle])
            <div class="col row">
                @include('shared.select', [
                    'default' => 'Choisir l\'initiateur du projet',
                    'class' => 'col',
                    'label' => 'Initiateur du projet', 
                    'name' => 'initiateur', 
                    'options' => [
                        'Les collectivités locales' => 'Les collectivités locales',
                        'La mairie' => 'La mairie',
                        'Etat' => 'L\'état',
                        'Le conseil régional' => 'Le conseil régional',
                    ],
                    'value' => $projet->initiateur]
                )
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Date de lancement du projet', 'name' => 'datedebut', 'type' => 'date', 'value' => $projet->datedebut])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Date de finition du projet', 'name' => 'datefin', 'type' => 'date', 'value' => $projet->datefin])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Delais d\'exécution du projet', 'name' => 'delai', 'type' => 'text', 'value' => $projet->delai])
            <div class="col row">
                @include('shared.select', [
                    'class' => 'col',
                    'default' => 'Choisir l\'état du projet',
                    'name' => 'etat', 
                    'options' => [
                        'Encours'=>'Encours',
                        'En attente'=>'En attente',
                        'Abandonné'=>'Abandonné',
                        'Achevé'=>'Achevé',
                    ], 
                    'value' => $projet->etat
                ])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Description du projet', 'name' => 'description', 'type' => 'textarea', 'value' => $projet->description])
        </div>
        <div>
            <button class="btn btn-primary">
                @if($projet->exists)
                    Modifer
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>

@endsection