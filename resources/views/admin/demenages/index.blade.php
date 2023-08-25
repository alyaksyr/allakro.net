@extends('admin.layout')

@section('title', 'Les déménagements du quartier')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.demenages.create')}}" class="btn btn-primary">
        Déclarer un déménagement
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom & prénoms</th>
            <th>Genre</th>
            <th>Fonction</th>
            <th>Contact</th>
            <th>Date de déménagement</th>
            <th>Destination</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($declarations as $declaration)
        <tr>
            <td>{{ $declaration->demenage->nom }}</td>
            <td>{{ $declaration->demenage->genre }}</td>
            <td>{{ $declaration->demenage->profession }}</td>
            <td>{{ $declaration->demenage->contact }}</td>
            <td>{{ date('d-m-Y', strtotime($declaration->demenage->depart)) }}</td>
            <td>{{ $declaration->demenage->destination }}</td>
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                    <a href="{{ route('admin.demenages.edit', $declaration->demenage)}}">   
                        <span class="btn btn-primary" title="Editer la ligne">
                            <i class="fas fa-fw fa-check"></i>
                        </span>
                    </a>                  
                    <form action="{{ route('admin.declarations.destroy', $declaration)}}" method="post">
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
{{$declarations->links()}}

@endsection

