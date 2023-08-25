
@extends('adminlte::page')

@section('title', $activite->exists ? 'Editer un activite' : 'Créer un activite')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')

<form action="{{route($activite->exists ? 'admin.activites.update' : 'admin.activites.store', $activite)}}" method="post">

@csrf 

@method($activite->exists ? 'put':'post')



<div class="row">
@include('shared.input', ['class' => 'col', 'label' => 'Dénomination', 'name' => 'libelle', 'type' => 'text', 'value' => $activite->libelle])
</div>
<div class="row">
    @include('shared.select', ['class' => 'col','label' => 'Type d\'activité','name' => 'domaine', 'options'=>['Commerciale'=>'Commerciale', 'Artisanale'=>'Artisanale', 'Agricole'=>'Agricole', 'Libérale'=>'Libérale'],'value' => $activite->domaine])
    <div class="col row">
        @include('shared.select', ['class' => 'col','label' => 'Secteur d\'activité','name' => 'secteur', 'options' => $options, 'value' => $activite->secteur])
    </div>
</div>
<div class="row">
    @include('shared.input', ['class' => 'col', 'name' => 'email', 'type' => 'email', 'value' => $activite->email])
    <div class="col row">
        @include('shared.input', ['class' => 'col', 'label' => 'Contact', 'name' => 'contact', 'type' => 'text', 'value' => $activite->contact])
    </div>
</div>
<div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'type' => 'text', 'value' => $activite->address])
</div>
<div class="row">
    <div class="col row">
        @include('shared.input', ['class' => 'col', 'label' => 'Détail de l\'activité', 'name' => 'description', 'type' => 'textarea', 'value' => $activite->description])
    </div>
</div>
<div>
    <button class="btn btn-primary">
        @if($activite->exists)
            Modifer
        @else
            Créer
        @endif
    </button>
</div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop