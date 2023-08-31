<table class="table table-stripad">
  <thead>
    <tr>
      <th>Nom de l'acteur</th>
      <th>Contact de l'acteur</th>
      <th>Domaine</th>
      <th>Centre d'intérêt</th>
      <th class="text-end">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($interets as $interet)
    <tr>
      <td>{{ $interet->acteur->nom }}</td>
      <td>{{ $interet->acteur->contact }}</td>
      <td>{{ $interet->domaine }}</td>
      <td>{{ $interet->libelle }}</td>
      <td>
        <div class="d-flex gap-2 w-100 justify-content-end">
          <a href="{{ route('admin.interets.edit', $interet)}}">
            <span class="btn btn-primary btn-sm" title="Editer la ligne">
              <i class="fas fa-fw fa-edit"></i>
            </span>
          </a>
          <form action="{{ route('admin.interets.destroy', $interet)}}" method="post">
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