<form action="{{route($activite->exists ? 'admin.activites.update' : 'admin.activites.store', $activite)}}" method="post">
    @csrf 

    @method($activite->exists ? 'put':'post')

    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Dénomination', 'name' => 'libelle', 'type' => 'text', 'value' => $activite->libelle])
        <div class="col row">
            @include('shared.select', [
                'default' => 'Choisir un secteur d\'activité',
                'class' => 'col',
                'label' => 'Secteur d\'activité',
                'name' => 'secteur', 
                'options' => $secteurs, 
                'value' => $activite->secteur
            ])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'name' => 'email', 'type' => 'email', 'value' => $activite->email])
        <div class="col row">
            @include('shared.input', ['class' => 'col', 'label' => 'Contact', 'name' => 'contact', 'type' => 'text', 'value' => $activite->contact])
        </div>
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'type' => 'text', 'value' => $activite->address])
    </div>
    <div class="row">
        @include('shared.input', ['class' => 'col', 'label' => 'Détail de l\'activité', 'name' => 'description', 'type' => 'textarea', 'value' => $activite->description])
    </div>
    <div>
    <input type="text" hidden id="acteur_id" value="{{$acteur->id}}" name="acteur_id">
        <button class="btn btn-primary">
            @if($activite->exists)
                Modifer
            @else
                Ajouter
            @endif
        </button>
    </div>
</form>