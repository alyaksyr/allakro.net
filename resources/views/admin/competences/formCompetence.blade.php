<form action="{{route($competence->exists ? 'admin.competence.update' : 'admin.competence.store', $competence)}}" method="post">

@csrf 

@method($competence->exists ? 'put':'post')



<div class="row">
    @include('shared.select', ['class' => 'col', 'label' => 'Domaine de compétence', 'name' => 'domaine', 'options' => '$domaines', 'value' => $competence->domaine])
    @include('shared.select', ['class' => 'col','label' => 'Secteur de compétence','name' => 'secteur', 'options' => $seceturs,'value' => $competence->secetur])
</div>
<div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Compétence', 'name' => 'libelle', 'type' => 'text', 'value' => $competence->libelle])
    @include('shared.input', ['class' => 'col','name' => 'photo', 'type' => 'file', 'value' => $competence->photo])
    </div>
</div>
<div class="row">
    @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'type' => 'textarea', 'value' => $competence->description])
</div>
<div class="row">
    <input type="text" hidden name="acteur_id" id="acteur_id">
</div>
<div>
    <button class="btn btn-primary">
        @if($competence->exists)
            Modifer
        @else
            Créer
        @endif
    </button>
</div>
</form>