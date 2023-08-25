@extends('admin.layout')

@section('title', 'Les naissances du quartier')

@section('content')

<table class="table table-stripad">
    <thead>
        <tr>
            <th>Nom & prénoms</th>
            <th>Genre</th>
            <th>Date de naissance</th>
            <th>Père</th>
            <th>Mère</th>
            <th>Contact parent</th>
            <th>Status</th>
            <th class="text-end" style="text-align: end;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($declarations as $declaration)
            <tr>
                <td>{{ $declaration->naissance->nom }}</td>
                <td>{{ $declaration->naissance->genre }}</td>
                <td>{{ date('d-m-Y', strtotime($declaration->naissance->datenais))}}</td>
                <td>{{ $declaration->naissance->pere }}</td>
                <td>{{ $declaration->naissance->mere }}</td>
                <td>{{ $declaration->naissance->contact }}</td>
                <td>
                    <form action="{{ route('admin.declarations.update', $declaration)}}" method="post">
                        @php
                            $status = ($declaration->status==1) ? "Désactivée":"Activée"
                        @endphp
                        @csrf 
                        @method('put')
                        @include('shared.checkbox', [
                            'class' => 'col', 
                            'label' => $status, 
                            'name' => 'status', 
                        ])
                    <button class="btn btn-primary">
                        <i class="fas fa-fw fa-check"></i>
                    </button>
                    </form>
                </td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.naissances.edit', $declaration->naissance)}}">    
                            <button class="btn btn-success">
                               <i class="fas fa-fw fa-check"></i>
                            </button>
                        </a>   
                                           
                        <form action="{{ route('admin.naissances.destroy', $declaration)}}" method="post">
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
{{$declarations->links()}}

@endsection