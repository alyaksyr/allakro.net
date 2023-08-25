
@extends('admin.layout')

@section('title', $niveau->exists ? 'Editer un niveau scolaire' : 'Créer un niveau scolaire')


@section('content')

<form action="{{route($niveau->exists ? 'admin.niveaux.update' : 'admin.niveaux.store', $niveau)}}" method="post">

    @csrf 
    @method($niveau->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Libellé niveau', 'name' => 'niveau', 'type' => 'text', 'value' => $niveau->niveau])
    </div>
    <div>
        <button class="btn btn-primary">
            @if($niveau->exists)
                Modifer
            @else
                Créer
            @endif
        </button>
    </div>
</form>
@endsection