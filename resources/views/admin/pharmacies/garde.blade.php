
@extends('admin.layout')

@section('title', $garde->exists ? 'Editer une garde' : 'Créer une garde')

@section('content')

<form action="{{route($garde->exists ? 'admin.gardes.update' : 'admin.gardes.store', $garde)}}" method="post">

    @csrf 
    @method($garde->exists ? 'put':'post')

    <div class="row">
        <input type="text" id="pharmacie_id" name="pharmacie_id" hidden value="{{ $pharmacie->id}}">
        @include('shared.input', ['class' => 'col', 'label' => 'Nom de la pharmacie', 'type' => 'text', 'value' => $pharmacie->nom])
        <div class="col row">
            @include('shared.input', ['class' => 'col', 'label' => 'Nom du pharmacien', 'name' => 'responsable', 'type' => 'text', 'value' => $garde->responsable])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Début de la garde', 'name' => 'debut', 'type' => 'date', 'value' => $garde->debut])
        <div class="col row">
            @include('shared.input', ['class' => 'col', 'label' => 'Fin de la garde', 'name' => 'fini', 'type' => 'date', 'value' => $garde->fini])
        </div>
    </div>
    <div>
        <button class="btn btn-primary">
            @if($garde->exists)
                Modifer
            @else
                Créer
            @endif
        </button>
    </div>
</form>
@endsection