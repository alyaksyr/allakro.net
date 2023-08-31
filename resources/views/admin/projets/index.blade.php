@extends('admin.layout')

@section('title', 'Projets initiés dans le quartier')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.projets.create')}}" class="btn btn-primary">
        Ajouter un projet
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Libellé du projet</th>
            <th>Initiateur</th>
            <th>Delais</th>
            <th>Date de début</th>
            <th>Date de finition</th>
            <th>Etat</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projets as $projet)
            <tr>
                <td>{{ $projet->libelle }}</td>
                <td>{{ $projet->initiateur }}</td>
                <td>{{ $projet->delai }}</td>
                <td>{{ $projet->datedebut }}</td>
                <td>{{ $projet->datefin }}</td>
                <td>{{ $projet->etat }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.projets.edit', $projet)}}">
                            <span class="btn btn-primary btn-sm" title="Editer la ligne">
                                <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>
                        <form action="{{ route('admin.projets.destroy', $projet)}}" method="post">
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

{{$projets->links()}}

@endsection

