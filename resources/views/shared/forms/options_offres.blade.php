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