<form action="{{route($interet->exists ? 'admin.interets.update' : 'admin.interets.store', $interet)}}" method="post">

        @csrf 

        @method($interet->exists ? 'put':'post')



        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Domaine', 'name' => 'domaine', 'type' => 'text', 'value' => $interet->domaine])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Libellé du centre d\'intérêt', 'name' => 'libelle', 'type' => 'text', 'value' => $interet->libelle])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'value' => $interet->description])
        </div>
        <input type="text" hidden id="acteur_id" value="{{$acteur->id}}" name="acteur_id">
        <div>
            <button class="btn btn-primary">
                @if($interet->exists)
                    Modifer
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>