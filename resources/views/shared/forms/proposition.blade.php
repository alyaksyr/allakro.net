<form action="{{route('propositions.store', $proposition)}}" method="post">
    <div class="container">
        @csrf 
        @method('post')

        <fieldset class="form-group border p-2">
            <legend class="w-auto px-2">Détails de l'offre</legend>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'label' => 'Service offert', 
                    'name' => 'libelle', 
                    'type' => 'text', 
                    'value' => $proposition->libelle
                ])
            </div>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'label' => 'Mes compétences', 
                    'name' => 'competence', 
                    'type' => 'text', 
                    'value' => $proposition->competence
                ])
            </div>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'label' => 'Photo de l\'proposition', 
                    'name' => 'photo', 
                    'type' => 'file'
                ])
            </div>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'label' => 'Description du service offert', 
                    'name' => 'detail', 
                    'type' => 'textarea', 
                    'value' => $proposition->detail
                ])
            </div>
        </fieldset>
        <fieldset class="form-group border p-2">
            <legend class="w-auto px-2">Informations personnelles</legend>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'name' => 'nom', 
                    'type' => 'text'
                ])
                <div class="col row">
                    @include('shared.input', [
                        'class' => 'col', 
                        'label' => 'Contact', 
                        'name' => 'contact', 
                        'type' => 'text', 
                    ])
                </div>
                <div class="col row">
                    @include('shared.select', [
                        'default'=>'Choisir le sexe',
                        'class' => 'col',
                        'label' => 'Votre genre',
                        'name' => 'genre', 
                        'options' => ['M' => 'Masculin', 'F' => 'Féminin']
                    ])
                </div>
            </div>
            <div class="row">
                @include('shared.input', [
                        'class' => 'col', 
                        'label' => 'Eamil', 
                        'name' => 'email', 
                        'type' => 'email', 
                    ])
                <div class="col row">
                    @include('shared.input', [
                        'class' => 'col', 
                        'label' => 'Mot de passe', 
                        'name' => 'password', 
                        'type' => 'password', 
                    ])
                </div>
            </div>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'label' => 'Adresse', 
                    'name' => 'address', 
                    'type' => 'textarea', 
                    'value' => $proposition->address
                ])
            </div>
            <div class="row pl-4">
                @include('shared.checkbox', [
                    'class' => 'col', 
                    'label' => 'Résident', 
                    'name' => 'resident', 
                ])
            </div>
        </fieldset>
        <div class="d-flex flex-row-reverse">
            <div>
                <button class="btn btn-primary pr-3 pl-3">
                    @if($proposition->exists)
                        Modifer
                    @else
                        Publier
                    @endif
                </button>
            </div>
        </div>
    </div>
</form>