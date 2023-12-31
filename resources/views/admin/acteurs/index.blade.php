@extends('admin.layout')

@section('title', 'Toutes les acteurs')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.acteurs.create')}}" class="btn btn-primary">
        Ajouter un acteur
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom & prénoms</th>
            <th>Genre</th>
            <th>Contacts</th>
            <th>Adresse</th>
            <th>Professions</th>
            <th>Niveau d'étude</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($acteurs as $acteur)
            <tr>
                <td>{{ $acteur->nom }}</td>
                <td>{{ $acteur->genre }}</td>
                <td>{{ $acteur->contact }}</td>
                <td>{{ $acteur->address }}</td>
                <td>{{ $acteur->profession }}</td>
                <td>{{ $acteur->niveau }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.acteurs.show', $acteur)}}">
                            <span title="Voir le profil de l'acteur" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-eye"></i>
                            </span>
                        </a>
                        <a href="{{ route('admin.acteurs.edit', $acteur)}}">  
                            <span title="Modifier les informations personnelles de l'acteur" class="btn btn-warning btn-sm">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a> 
                        <form action="{{ route('admin.acteurs.destroy', $acteur)}}" method="post">
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

{{$acteurs->links()}}

@endsection

