@extends('admin.layout')

@section('title', $epidemie->exists ? 'Editer une épidémie' : 'Créer une épidémie')

@section('content')
    <form action="{{route($epidemie->exists ? 'admin.epidemies.update' : 'admin.epidemies.store', $epidemie)}}" method="post">

        @csrf 

        @method($epidemie->exists ? 'put':'post')



        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Libellé épidémie', 'name' => 'libelle', 'type' => 'text', 'value' => $epidemie->libelle])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Type épidémie', 'name' => 'type', 'type' => 'text', 'value' => $epidemie->type])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Cause de l\'épidémie', 'name' => 'cause', 'type' => 'textarea', 'value' => $epidemie->cause])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Foyer de l\'épidémie', 'name' => 'foyer', 'type' => 'textarea', 'value' => $epidemie->foyer])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Début de l\'épidémie', 'name' => 'datedebut', 'type' => 'date', 'value' => $epidemie->datedebut])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Fin de l\'épidémie', 'name' => 'datefin', 'type' => 'date', 'value' => $epidemie->datefin])
            </div>
        </div>

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Durée de l\'épidémie', 'name' => 'duree', 'type' => 'text', 'value' => $epidemie->duree])
            @include('shared.select', [
                'default' => 'Choisir l\'état de l\'épidémie',
                'class' => 'col',
                'label' => 'Etat de l\'épidémie', 
                'name' => 'etat', 
                'options' => ['En cours' => 'En cours', 'Eradiquée' => 'Eradiquée'],
                'value' => $epidemie->etat]
            )
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Nombre total de cas', 'name' => 'nombre_cas', 'type' => 'number', 'value' => $epidemie->nombre_cas])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Les symptômes observés', 'name' => 'symptomes', 'type' => 'textarea', 'value' => $epidemie->symptomes])
        </div>
        <div>
            <button class="btn btn-primary">
                @if($epidemie->exists)
                    Modifer
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>

@endsection