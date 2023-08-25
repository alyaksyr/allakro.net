@extends('admin.layout')

@section('title', 'Les pharmacies')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.pharmacies.create')}}" class="btn btn-primary">
        Ajouter une pharmacie
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom</th>
            <th>contact</th>
            <th>Pharmacien</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pharmacies as $pharmacie)
            <tr>
                <td>{{ $pharmacie->nom }}</td>
                <td>{{ $pharmacie->contact }}</td>
                <td>{{ $pharmacie->responsable }}</td>
                
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.pharmacies.edit', $pharmacie)}}">   
                            <span title="Modifier la ligne" class="btn btn-primary">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>   
                        <a href="{{ route('admin.pharmacies.garde', $pharmacie)}}" class="btn btn-success" title="Editer la période de garde">
                            <i class="fas fa-fw fa-plus"></i>
                        </a>                 
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$pharmacies->links()}}

@endsection