
@extends('admin.layout')

@section('title', $service->exists ? 'Editer un service médical' : 'Créer un service médical')


@section('content')

<form action="{{route($service->exists ? 'admin.services.update' : 'admin.services.store', $service)}}" method="post">

    @csrf 
    @method($service->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Nom du service', 'name' => 'libelle', 'type' => 'text', 'value' => $service->libelle])
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Détail du service', 'name' => 'detail', 'type' => 'textarea', 'value' => $service->detail])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($service->exists)
                Modifer
            @else
                Créer
            @endif
        </button>
    </div>
</form>
@endsection