@extends('admin.layout')

@section('title', 'Les niveaux scolaires')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.niveaux.create')}}" class="btn btn-primary">
        Ajouter un niveau
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Libellé niveau</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($niveaux as $niveau)
            <tr>
                <td>{{ $niveau->niveau }}</td>                
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.niveaux.edit', $niveau)}}" > 
                            <span class="btn btn-primary" title="Editer la ligne">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>             
                        <form action="{{ route('admin.niveaux.destroy', $niveau)}}" method="post">
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
{{$niveaux->links()}}

@endsection