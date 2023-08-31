<table class="table table-stripad">
    <thead>
        <tr>
            <th>Secteur</th>
            <th>Dénomination</th>
            <th>Nom de l'acteur</th>
            <th>Contact</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activites as $activite)
            <tr>
                <td>{{ $activite->secteur }}</td>
                <td>{{ $activite->libelle }}</td>
                <td>{{ $activite->acteur->nom }}</td>
                <td>{{ ($activite->contact) }}</td>
                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.activites.edit', $activite)}}" class="btn btn-primary">Editer</a>
                        <form action="{{ route('admin.activites.destroy', $activite)}}" method="post">
                            @csrf    
                            @method('delete')    

                            <button class="btn btn-danger">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>