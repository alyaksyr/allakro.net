@extends('admin.layout')

@section('title', 'Les gardes')

@section('content')


<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.gardes.create')}}" class="btn btn-primary">
        Définir la garde
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Début de garde</th>
            <th>fin de garde</th>
            <th>Responsable de garde</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gardes as $garde)
            <tr>
                <td>{{ $garde->debut }}</td>
                <td>{{ $garde->fini }}</td>
                <td>{{ $garde->responsable }}</td>
                
                <td>
                    <div class="d-flex gap-5 w-100 justify-content-end">
                        <form action="{{ route('admin.gardes.edit', $garde)}}" method="put">
                            @csrf    
                            @method('put')    
                            <button class="btn btn-success" title="Modifier la ligne">
                               <i class="fas fa-fw fa-check"></i>
                            </button>
                        </form>   
                        <a href="{{ route('admin.gardes.garde', $garde)}}" class="btn btn-primary" title="Editer la période de garde">
                            <i class="fas fa-fw fa-plus"></i>
                        </a>                 
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$gardes->links()}}

@endsection