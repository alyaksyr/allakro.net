
@extends('admin.layout')

@section('title', $categorie->exists ? 'Editer une catégorie' : 'Créer une catégorie')


@section('content')

<form action="{{route($categorie->exists ? 'admin.categories.update' : 'admin.categories.store', $categorie)}}" method="post">

    @csrf 
    @method($categorie->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Nom de la catégorie', 'name' => 'libelle', 'type' => 'text', 'value' => $categorie->libelle])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($categorie->exists)
                Modifer
            @else
                Créer
            @endif
        </button>
    </div>
</form>
@endsection