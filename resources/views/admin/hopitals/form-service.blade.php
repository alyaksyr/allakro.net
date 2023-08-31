
@extends('admin.layout')

@section('title', $service->exists ? 'Editer un service de santé' : 'Ajouter un service de santé')

@section('content')

<form action="{{route($service->exists ? 'admin.services.update' : 'admin.services.store', $service, $hopital)}}" method="post">

    @csrf 
    @method($service->exists ? 'put':'post')
    <div class="row">
        <input type="text" id="hopital_id" name="hopital_id" hidden value="{{ $hopital->id}}">
        @include('shared.input', [
            'class' => 'col', 
            'label' => 'Nom du centre de santé', 
            'name' => 'hopital_name', 
            'type' => 'text', 
            'value' => $hopital->nom,
            'disabled' => true
        ])
        
        <div class="col row">
            @include('shared.input', [
                'class' => 'col',
                'type'=>'text',
                'label' => 'Libellé du service',
                'name' => 'libelle',  
                'value' => $service->libelle
            ])
        </div>
    </div>   
    <div class="row">
        @include('shared.input', [
            'class' => 'col', 
            'label' => 'Responsable du service', 
            'name' => 'responsable', 
            'type' => 'text', 
            'value' => $service->responsable
        ])
        <div class="col row">
            @include('shared.input', [
                'class' => 'col', 
                'label' => 'Contact', 
                'name' => 'contact', 
                'type' => 'text', 
                'value' => $service->contact
            ])
        </div>
    </div> 
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Les différentes prestations', 'name' => 'prestation', 'type' => 'textarea', 'value' => $service->prestation])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($service->exists)
                Modifer
            @else
                Ajouter
            @endif
        </button>
    </div>
</form>
@endsection