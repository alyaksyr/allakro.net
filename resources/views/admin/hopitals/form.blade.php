
@extends('admin.layout')

@section('title', $hopital->exists ? 'Editer un centre de santé' : 'Créer un centre de santé')

@section('content')

<form action="{{route($hopital->exists ? 'admin.hopitals.update' : 'admin.hopitals.store', $hopital)}}" method="post">

@csrf 

@method($hopital->exists ? 'put':'post')



<div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Centre de santé', 'name' => 'nom', 'type' => 'text', 'value' => $hopital->nom])
</div>
<div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Contact', 'name' => 'contact', 'type' => 'text', 'value' => $hopital->contact])
    <div class="col row">
        @include('shared.select', ['class' => 'col','label' => 'Type de centre de santé','name' => 'type', 'options'=>[''=>'Choisir le type de centre de santé','Public'=>'Public', 'Prive'=>'Privé'], 'value' => $hopital->type])
    </div>
</div>
<div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Situation du centre de santé', 'name' => 'address', 'type' => 'textarea', 'value' => $hopital->address])
</div>
<div class="row">
    @include('shared.select', ['class' => 'col','label' => 'Services offerts','name' => 'offres', 'options' => $offres, 'value' => $hopital->offres()->pluck('id'), 'multiple'=>true])
</div>
<div class="row">
    @include('shared.select', ['class' => 'col','label' => 'Bons acceptés','name' => 'bons', 'options' => $bons, 'value' => $hopital->bons()->pluck('id'), 'multiple'=>true])
</div>
<div>
    <button class="btn btn-primary">
        @if($hopital->exists)
            Modifer
        @else
            Créer
        @endif
    </button>
</div>
</form>
@endsection