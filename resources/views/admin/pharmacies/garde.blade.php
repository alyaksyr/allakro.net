
@extends('admin.layout')

@section('title', 'Definir la période de garde')

@section('content')

<form action="{{route('admin.gardes.store', $garde, $pharmacie)}}" method="post">

    @csrf 
    @method('post')

    <div class="row">
        <input type="text" id="pharmacie_id" name="pharmacie_id" hidden value="{{ $pharmacie->id}}">
        @include('shared.input', ['class' => 'col', 'label' => 'Nom de la pharmacie', 'type' => 'text', 'value' => $pharmacie->nom, 'disabled' => true])
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
             Définir
        </button>
    </div>
</form>
@endsection