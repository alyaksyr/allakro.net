@extends('admin.layout')

@section('title', 'Les bons médicaux')

@section('content')
<div class="d-flex mb-2 justify-content-end align-item-end">
    <a href="{{ route('admin.bons.create')}}" class="btn btn-primary">
        Ajouter un bon
    </a>
</div>
<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom du bon</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bons as $bon)
            <tr>
                <td>{{ $bon->libelle }}</td>                
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.bons.edit', $bon)}}">  
                            <span class="btn btn-primary" title="Editer la ligne">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>   
                                           
                        <form action="{{ route('admin.bons.destroy', $bon)}}" method="post">
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
{{$bons->links()}}

@endsection