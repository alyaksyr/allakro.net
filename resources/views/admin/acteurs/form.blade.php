

    <form action="{{route($acteur->exists ? 'admin.acteurs.update' : 'admin.acteurs.store', $acteur)}}" method="post">

        @csrf 

        @method($acteur->exists ? 'put':'post')



        <div class="row">
            @include('shared.input', ['class' => 'col-12', 'label' => 'Nom & prénoms', 'name' => 'nom', 'type' => 'text', 'value' => $acteur->nom])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Lieu dee naissance', 'name' => 'lieunais', 'type' => 'text', 'value' => $acteur->lieunais])
            @include('shared.select', [
                'default' => 'Choisir la tranche d\'age',
                'class' => 'col',
                'name' => 'age', 
                'options' => $ages,
                'value' => $acteur->age]
            )
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Nationalité', 'name' => 'nationalite', 'type' => 'text', 'value' => $acteur->nationalite])
                @include('shared.select', [
                    'class' => 'col',
                    'default' => 'Choisir le genre',
                    'name' => 'genre', 
                    'options' => ['M'=>'Masculin','F'=>'Féminin'], 
                    'value' => $acteur->genre
                ])
                
            </div>
        </div>
        <div class="row">
            @include('shared.select', [
                'class' => 'col',
                'default' => 'Choisir le niveau d\'étude',
                'name' => 'niveau', 
                'options' => $niveaux, 
                'value' => $acteur->niveau
                ])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Profession', 'name' => 'profession', 'type' => 'text', 'value' => $acteur->profession])
            </div>
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'type' => 'text', 'value' => $acteur->address])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Contact', 'name' => 'contact', 'type' => 'text', 'value' => $acteur->contact])
               
            </div>
        </div>
        <div>
            <button class="btn btn-primary">
                @if($acteur->exists)
                    Modifer
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>