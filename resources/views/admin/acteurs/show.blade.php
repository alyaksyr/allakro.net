@extends('admin.layout')

@section('title', 'Gérer un acteur')

@section('content')


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true">Contact</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="competence-tab" data-bs-toggle="tab" data-bs-target="#competence" type="button" role="tab" aria-controls="competence" aria-selected="false">Compétences</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="interet-tab" data-bs-toggle="tab" data-bs-target="#interet" type="button" role="tab" aria-controls="interet" aria-selected="false">Centres d'intérets</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="activite-tab" data-bs-toggle="tab" data-bs-target="#activite" type="button" role="tab" aria-controls="activite" aria-selected="false">Activités</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="container">
      <h4 class="mt-3 mb-3">Les informations de l'acteur</h4>
      
      @include('admin.acteurs.form')
    </div>
  </div>


  <div class="tab-pane fade" id="competence" role="tabpanel" aria-labelledby="competence-tab">
    
    <!-- <div class="d-flex mb-2"> -->
      <div class="row d-flex mt-3 mb-3">
        <div class="col-sm-6">
          <h4>Les compétences de l'acteur</h4>
        </div>
        <div class="col-sm-6 d-flex justify-content-end align-item-end">
          <a data-attr="{{ route('admin.competences.create')}}" class="btn btn-primary" data-toggle="modal" id="open" data-target="#competenceModal">
            Ajouter une compétence
          </a>
        </div>
      </div>
    <!-- </div> -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-stripad">
      <thead>
        <tr>
            <th>Secteur d'activité</th>
            <th>Domaine d'activité</th>
            <th>Nom de la compétence</th>
            <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($acteur->competences as $competence)
          <tr>
              <td>{{ $competence->secteur }}</td>
              <td>{{ $competence->domaine }}</td>
              <td>{{ $competence->libelle }}</td>
              <td>
                  <div class="d-flex gap-2 w-100 justify-content-end">
                      <a data-attr="{{ route('admin.competences.edit', $competence)}}" class="btn btn-primary" id="open" data-target="#competenceModal">
                        Editer</a>
                      <form action="{{ route('admin.competences.destroy', $competence)}}" method="post">
                            @csrf    
                            @method('delete')    

                            <button class="btn btn-danger">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
                <!-- Modal -->
      <div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-labelledby="myModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document" >
          <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">
           
              <h5 class="modal-title" id="competenceModalTitle">Editer une compétence</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{route($competence->exists ? 'admin.competences.update' : 'admin.competences.store', $competence)}}" method="post" enctype="multipart/form-data" id="form{{$competence->id}}">
              @csrf 
              @method($competence->exists ? 'put':'post')
              <div class="row">
                @include('shared.select', ['class' => 'col', 'label' => 'Domaine de compétence', 'name' => 'domaine', 'options' => $domaines, 'value' => $competence->domaine])
                @include('shared.select', ['class' => 'col','label' => 'Secteur de compétence','name' => 'secteur', 'options' => $secteurs,'value' => $competence->secetur])
              </div>
              <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Compétence', 'name' => 'libelle', 'type' => 'text', 'value' => $competence->libelle])
                @include('shared.input', ['class' => 'col','name' => 'photo', 'type' => 'file', 'value' => $competence->photo])
              </div>
              <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'description', 'type' => 'textarea', 'value' => $competence->description])
              </div>
              <div class="row">
                <input type="text" hidden name="acteur_id" id="acteur_id">
              </div>
              <button type="button" class="btn btn-primary" id="formSubmit">
                @if($competence->exists)
                  Modifer
                @else
                    Créer
                @endif
              </button>
              </form>
            </div>
          </div>
        </div>
      </div>
            @endforeach
        </tbody>
    </table>
    
  </div>


  <div class="tab-pane fade" id="interet" role="tabpanel" aria-labelledby="interet-tab">...</div>
  <div class="tab-pane fade" id="activite" role="tabpanel" aria-labelledby="activite-tab">...</div>

</div>
<script> 
  jQuery(document).ready(function(){
    jQuery('#formSubmit').click(function(e){
      e.preventDefault();
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: "{{ url('/competences') }}",
        method: 'post',
        data: {
          domaine: jQuery('#domaine').val(),
          secteur: jQuery('#secteur').val(),
          libelle: jQuery('#libelle').val(),
          photo: jQuery('#photo').val(),
          description: jQuery('#description').val(),
          acteur_id: jQuery('#acteur_id').val(),
        },
        success: function(result){
          if(result.errors)
          {
            jQuery('.alert-dander').html('');

            jQuery.each(result.errors, function(key, value){
              jQuery('.alert-danger').show();
              jQuery('.alert-danger').append('<li>'+value+'</li>');
            });
          }
          else
          {
            jQuery('.alert-danger').hide();
            $('#open').hide();
            $('#competenceModal').modal('hide');
          }
        }
      });
    });
  });
</script>
@endsection
