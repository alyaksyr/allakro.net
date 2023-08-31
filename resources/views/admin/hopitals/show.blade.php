@extends('admin.layout')

@section('title', 'Les informations sur le centre de santé')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.services.create', ["hopital_id" => $hopital->id])}}" class="btn btn-primary">
        Ajouter un service médical
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom du service</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hopital->services as $service)
            <tr>
                <td>{{ $service->libelle }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.services.edit', $service)}}">  
                            <span title="Modifier la ligne" class="btn btn-warning btn-sm">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>   
                                           
                        <form action="{{ route('admin.services.destroy', $service)}}" method="post">
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
{{$services->links()}}

@endsection