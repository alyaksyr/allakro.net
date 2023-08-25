@extends('admin.layout')

@section('title', 'Les services médicaux')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.services.create')}}" class="btn btn-primary">
        Ajouter un service
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
        @foreach($services as $service)
            <tr>
                <td>{{ $service->libelle }}</td>                
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.services.edit', $service)}}"> 
                            <span class="btn btn-primary" title="Editer la ligne">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>   
                                           
                        <form action="{{ route('admin.services.destroy', $service)}}" method="post">
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
{{$services->links()}}

@endsection