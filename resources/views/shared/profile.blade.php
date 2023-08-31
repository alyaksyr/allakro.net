
<div class="card p-4 mb-4">
  <div class="d-flex b-b pb-2 justify-content-between align-item-end">
    <h3 class="text-bold">Mes informations personnelles</h3>
    <a href="{{ route('compte.profile.edit', $acteur)}}" class="btn btn-primary btn-sm">
      Mettre à jour
    </a>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-6">
        <table class="table">
          <tr>
            <td class="text-bold">Nom & prénoms : </td>
            <td>{{$acteur->nom}}</td>
          </tr>
          <tr>
            <td class="text-bold">Genre : </td>
            <td>{{$acteur->genre}}</td>
          </tr>
          <tr>
            <td class="text-bold">Nationalité : </td>
            <td>{{$acteur->nationalite}}</td>
          </tr>
          <tr>
            <td class="text-bold">Tranche d'age : </td>
            <td>{{$acteur->age}}</td>
          </tr>
          <tr>
            <td class="text-bold">Lieu de naissance : </td>
            <td>{{$acteur->lieunais}}</td>
          </tr>
        </table>
      </div>
      <div class="col-6">
        <table class="table ">
          <tr>
            <td class="text-bold">Niveau d'étude : </td>
            <td>{{$acteur->niveau}}</td>
          </tr>
          <tr>
            <td class="text-bold">Profession : </td>
            <td>{{$acteur->profession}}</td>
          </tr>
          <tr>
            <td class="text-bold">Contact : </td>
            <td>{{$acteur->contact}}</td>
          </tr>
          <tr>
            <td class="text-bold">Résident du quartier ? : </td>
            <td>{{($acteur->resident==1) ? 'Oui' : 'Non'}}</td>
          </tr>
          <tr>
            <td class="text-bold">Lieu d'habitation : </td>
            <td>{{$acteur->address}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="card p-4 mb-4">
  <div class="d-flex b-b pb-2 justify-content-between align-item-end">
    <h3 class="text-bold">Mes Compétences</h3>
    <a href="{{ route('compte.competences.create', ['profile'=>$acteur->id])}}" class="btn btn-primary btn-sm">
      Ajouter
    </a>
  </div>
  <div class="card-body">
    @if($acteur->competences != null)

    <table class="table table-stripad">
      <tbody>
        @foreach($acteur->competences as $competence)
          <tr>
            <td>{{ $competence->secteur }}</td>
            <td>{{ $competence->libelle }}</td>
            <td>
              <div class="d-flex gap-2 w-100 justify-content-end">
                <a href="{{ route('compte.competences.edit', $competence)}}">
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
    @else
      <span> Aucunes données à afficher</span>
    @endif
  </div>
</div>

<div class="card p-4 mb-4">
  <div class="d-flex b-b pb-2 justify-content-between align-item-end">
    <h3 class="text-bold">Mes centres d'intéret</h3>
    <a href="{{ route('compte.interets.create',['profile'=>$acteur->id])}}" class="btn btn-primary btn-sm">
      Ajouter
    </a>
  </div>
    <div class="card-body">
      @if($acteur->interets != null)
      <table class="table table-stripad">
        <tbody>
          @foreach($acteur->interets as $interet)
          <tr>
            <td>{{ $interet->domaine }}</td>
            <td>{{ $interet->libelle }}</td>
            <td>
              <div class="d-flex gap-2 w-100 justify-content-end">
                <a href="{{ route('compte.interets.edit', $interet)}}">
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
      @else
        <span> Aucunes données à afficher</span>
      @endif
  </div>
</div>

<div class="card p-4 mb-4">
  <div class="d-flex b-b pb-2 justify-content-between align-item-end">
    <h3 class="text-bold">Mes activités</h3>
    <a href="{{ route('compte.activites.create',['profile'=>$acteur->id])}}" class="btn btn-primary btn-sm">
      Ajouter
    </a>
  </div>
  <div class="card-body">
    @if($acteur->activites != null)
    <table class="table table-stripad">

      <tbody>
        @foreach($acteur->activites as $activite)
        <tr>
          <td>{{ $activite->secteur }}</td>
          <td>{{ $activite->libelle }}</td>
          <td>
            <div class="d-flex  gap-2 w-100 justify-content-end">
              <a href="{{ route('compte.activites.edit', $activite)}}">
                <span class="btn btn-primary btn-sm" title="Editer la ligne">
                  <i class="fas fa-fw fa-edit"></i>
                </span>
              </a>
              <form action="{{ route('admin.activites.destroy', $activite)}}" method="post">
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
    @else
      <span> Aucunes données à afficher</span>
    @endif
  </div>
</div>
