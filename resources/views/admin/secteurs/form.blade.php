
@extends('admin.layout')

@section('title', $secteur->exists ? 'Editer un secteur d\'activité' : 'Créer un secteur d\'activité')


@section('content')

<form action="{{route($secteur->exists ? 'admin.secteurs.update' : 'admin.secteurs.store', $secteur)}}" method="post">

    @csrf 
    @method($secteur->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Secteur d\'activité', 'name' => 'libelle', 'type' => 'text', 'value' => $secteur->libelle])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($secteur->exists)
                Modifer
            @else
                Créer
            @endif
        </button>
    </div>
</form>
@endsection