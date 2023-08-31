@extends('admin.layout')

@section('title', 'Gérer un acteur')

@section('content')

<fieldset class="border rounded-3 p-3 mb-2">
  <legend class="d-flex mb-2 justify-content-between align-item-end">
    <span>
      Informations personnelles
    </span>
    <a href="{{ route('admin.acteurs.edit', $acteur)}}" class="btn btn-primary">
          Mettre à jour
      </a>
  </legend>
  <div class="container">
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
</fieldset>

<fieldset class="border rounded-3 p-3 mb-2">
  <legend class="d-flex mb-2 justify-content-between align-item-end">
    <span>
      Compétences de l'acteur
    </span>
    <a href="{{ route('admin.competences.create', ["acteur_id" => $acteur->id])}}" class="btn btn-primary">
      Ajouter
    </a>
  </legend>
  <table class="table table-stripad">
    <thead>
      <tr>
        <th>Secteur</th>
        <th>Nom de la compétence</th>
        <th class="text-end">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($acteur->competences as $competence)
        <tr>
          <td>{{ $competence->secteur }}</td>
          <td>{{ $competence->libelle }}</td>
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
</fieldset>

<fieldset class="border rounded-3 p-3 mb-2">
  <legend class="d-flex mb-2 justify-content-between align-item-end">
    <span>
      Centres d'intérêt de l'acteur
    </span>
    <a href="{{ route('admin.interets.create', ["acteur_id" => $acteur->id])}}" class="btn btn-primary">
      Ajouter
    </a>
  </legend>
  <table class="table table-stripad">
    <thead>
      <tr>
        <th>Domaine</th>
        <th>Centre d'intérêt</th>
        <th class="text-end">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($acteur->interets as $interet)
      <tr>
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
</fieldset>

<fieldset class="border rounded-3 p-3 mb-2">
  <legend class="d-flex mb-2 justify-content-between align-item-end">
    <span>
      Activités de l'acteur
    </span>
    <a href="{{ route('admin.activites.create', ['acteur_id '=> $acteur->id])}}" class="btn btn-primary">
      Ajouter
    </a>
  </legend>
  <table class="table table-stripad">
    <thead>
      <tr>
        <th>Secteur</th>
        <th>Dénomination</th>
        <th>Contact</th>
        <th class="text-end">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($acteur->activites as $activite)
      <tr>
        <td>{{ $activite->secteur }}</td>
        <td>{{ $activite->libelle }}</td>
        <td>{{ $activite->contact }}</td>
        <td>
          <div class="d-flex gap-2 w-100 justify-content-end">
            <a href="{{ route('admin.activites.edit', $activite)}}">
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
</fieldset>

@endsection