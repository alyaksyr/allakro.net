@extends('admin.layout')

@section('title', 'Les centres de santés')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.hopitals.create')}}" class="btn btn-primary">
        Ajouter un hôpital
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Directeur</th>
            <th>Contact</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hopitals as $hopital)
            <tr>
                <td>{{ $hopital->nom }}</td>
                <td>{{ $hopital->type}}</td>
                <td>{{ $hopital->responsable }}</td>
                <td>{{ $hopital->contact }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.hopitals.show', $hopital)}}">
                            <span title="Ajouter un service au centre de santé" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-plus"></i>
                            </span>
                        </a>
                        <a href="{{ route('admin.hopitals.edit', $hopital)}}">  
                            <span title="Modifier la ligne" class="btn btn-warning btn-sm">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>   
                                           
                        <form action="{{ route('admin.hopitals.destroy', $hopital)}}" method="post">
                            @csrf    
                            @method('delete')    

                            <span class="btn btn-danger btn-sm" title="Supprimer la ligne">
                                <i class="fas fa-fw fa-trash"></i>
                            </span>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$hopitals->links()}}

@endsection