@extends('admin.layout')

@section('title', 'Toutes les épidémies du quartier')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.epidemies.create')}}" class="btn btn-primary">
        Ajouter une épidémie
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom </th>
            <th>Type</th>
            <th>Nombre de cas</th>
            <th>Début</th>
            <th>Etat</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($epidemies as $epidemie)
            <tr>
                <td>{{ $epidemie->libelle }}</td>
                <td>{{ $epidemie->type }}</td>
                <td>{{ $epidemie->nombre_cas }}</td>
                <td>{{ $epidemie->datedebut }}</td>
                <td>{{ $epidemie->etat }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.epidemies.edit', $epidemie)}}">
                            <span class="btn btn-primary btn-sm" title="Editer la ligne">
                                <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>
                        <form action="{{ route('admin.epidemies.destroy', $epidemie)}}" method="post">
                            @csrf    
                            @method('delete')    

                            <button class="btn btn-danger btn-sm" title="Supprimer la ligne">
                            <span>
                                <i class="fas fa-fw fa-trash"></i>
                            </span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$epidemies->links()}}

@endsection

