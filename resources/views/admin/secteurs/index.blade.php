@extends('admin.layout')

@section('title', 'Les secteurs d\'activité')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.secteurs.create')}}" class="btn btn-primary">
        Ajouter un secteur
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom du secteur</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($secteurs as $secteur)
            <tr>
                <td>{{ $secteur->libelle }}</td>                
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.secteurs.edit', $secteur)}}" >  
                            <span class="btn btn-primary" title="Editer la ligne">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>   
                                           
                        <form action="{{ route('admin.secteurs.destroy', $secteur)}}" method="post">
                            @csrf    
                            @method('delete')    

                            <button class="btn btn-danger" title="Supprimer la ligne">
                                <i class="fas fa-fw fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$secteurs->links()}}

@endsection