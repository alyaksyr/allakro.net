@extends('admin.layout')

@section('title', 'Les Catégories')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.categories.create')}}" class="btn btn-primary">
        Ajouter une catégorie
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom de la categorie</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->libelle }}</td>                
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.categories.edit', $categorie)}}">  
                            <span class="btn btn-primary" title="Editer la ligne">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>   
                                           
                        <form action="{{ route('admin.categories.destroy', $categorie)}}" method="post">
                            @csrf    
                            @method('delete')    

                            <button class="btn btn-danger">
                                <i class="fas fa-fw fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$categories->links()}}

@endsection