@extends('admin.layout')

@section('title', 'Les aménagements dans le quartier')

@section('content')

<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.amenages.create')}}" class="btn btn-primary">
        Déclarer un aménagement
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom & prénoms</th>
            <th>Genre</th>
            <th>Fonction</th>
            <th>Date d'aménagement</th>
            <th>Provenance</th>
            <th>Mode d'hébergement</th>
            <th>Contact</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($declarations as $declaration)
            <tr>
                <td>{{ $declaration->amenage->nom }}</td>
                <td>{{ $declaration->amenage->genre }}</td>
                <td>{{ $declaration->amenage->profession }}</td>
                <td>{{ date('d-m-Y', strtotime($declaration->amenage->datearrive)) }}</td>
                <td>{{ $declaration->amenage->provenance }}</td>
                <td>{{ ($declaration->amenage->mode==0) ? "Nouvelle habitation":"Chez tuteur"}}</td>
                <td>{{ $declaration->amenage->contact }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.amenages.edit', $declaration->amenage)}}">   
                            <span class="btn btn-primary btn-sm" title="Editer la ligne">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>                  
                        <form action="{{ route('admin.declarations.destroy', $declaration)}}" method="post">
                            @csrf    
                            @method('delete')    
                            <button class="btn btn-danger btn-sm" title="Supprimer la ligne">
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