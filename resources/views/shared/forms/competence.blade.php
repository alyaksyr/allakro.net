<form action="{{route($competence->exists ? 'admin.competences.update' : 'admin.competences.store', $competence)}}" method="post" enctype="multipart/form-data" id="form{{$competence->id}}">
        @csrf 
        @method($competence->exists ? 'put':'post')
        <div class="row">
            @include('shared.select', [
                'class' => 'col',
                'default' => 'Choisir un secteur d\'activité',
                'label' => 'Secteur de compétence',
                'name' => 'secteur', 
                'options' => $secteurs,
                'value' => $competence->secteur
            ])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Compétence', 'name' => 'libelle', 'type' => 'text', 'value' => $competence->libelle])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col','name' => 'photo', 'type' => 'file', 'value' => $competence->photo])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'value' => $competence->description])
        </div>
         <input type="text" hidden id="acteur_id" value="{{$acteur->id}}" name="acteur_id">
        <button class="btn btn-primary">
            @if($competence->exists)
                Modifer
            @else
                Ajouter
            @endif
        </button>
    </form>