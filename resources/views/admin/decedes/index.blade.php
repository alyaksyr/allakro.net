@extends('admin.layout')

@section('title', 'Les décès du quartier')

@section('content')

<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom & prénoms</th>
            <th>Genre</th>
            <th>Date de naissance</th>
            <th>Date de décès</th>
            <th>Fonction</th>
            <th>Contact parent</th>
            <th>Status</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($declarations as $declaration)
            <tr>
                <td>{{ $declaration->decede->nom }}</td>
                <td>{{ $declaration->decede->genre }}</td>
                <td>{{ date('d-m-Y', strtotime($declaration->decede->datenais )) }}</td>
                <td>{{ date('d-m-Y', strtotime($declaration->decede->datedeces)) }}</td>
                <td>{{ $declaration->decede->profession }}</td>
                <td>{{ $declaration->decede->contact }}</td>
                <td>
                    <form action="{{ route('admin.declarations.update', $declaration)}}" method="post">
                        @php
                            $status = $declaration->status==1;
                        @endphp
        
                        @csrf 
                        @method('put')
                        @if($status==1)
                            <input type="checkbox" class="btn-check btn-sm" disabled id="btn-check-status" autocomplete="off">
                            <label for="btn-check-status" class="btn btn-success btn-sm">Activé</label>
                        @else
                            <input type="text" id="status" name="status" value="1" hidden>
                            <input type="checkbox" class="btn-check btn-sm" checked id="btn-check-status" autocomplete="off">
                            <button for="btn-check-status" class="btn btn-default btn-sm" title="Activie la déclaration">Désactivé</button>
                        @endif
                    </form>
                </td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">  
                        <a href="{{ route('admin.decedes.edit', $declaration->decede)}}">
                            <span class="btn btn-primary btn-sm">
                               <i class="fas fa-fw fa-edit"></i>
                            </span>
                        </a>        
                        <form action="{{ route('admin.declarations.destroy', $declaration)}}" method="post">
                            @csrf    
                            @method('delete')    

                            <button class="btn btn-danger btn-sm">
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
