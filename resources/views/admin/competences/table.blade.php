<table class="table table-stripad">
    <thead>
        <tr>
            <th>Secteur</th>
            <th>Nom de la compétence</th>
            <th>Nom de l'acteur</th>
            <th>Contact de l'acteur</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($competences as $competence)
        <tr>
            <td>{{ $competence->secteur }}</td>
            <td>{{ $competence->libelle }}</td>
            <td>{{ $competence->acteur->nom }}</td>
            <td>{{ $competence->acteur->contact }}</td>
            
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                    <a href="{{ route('admin.competences.edit', $competence)}}">
                        <span class="btn btn-primary btn-sm" title="Editer la ligne">
                            <i class="fas fa-fw fa-edit"></i>
                        </span>
                    </a>
                    <form action="{{ route('admin.competences.destroy', $competence)}}" method="post">
                        @csrf    
                        @method('delete')    

                        <button class="btn btn-danger btn-sm" title="Supprimer la ligne">
                            <i class="fas fa-fw fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>