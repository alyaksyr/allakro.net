<form action="{{route('annonces.store', $annonce)}}" method="post">
    <div class="container">
        @csrf 
        @method('post')

        <fieldset class="form-group border p-2" id="detailAnnonce">
            <legend class="w-auto px-2">Détails de l'annonce</legend>
            <div class="row">
                @include('shared.select', [
                    'default'=>'Choisir la catégorie',
                    'class' => 'col',
                    'label' => 'Catégorie d\'annonce',
                    'name' => 'categorie_id', 
                    'options' => $options, 
                    'value' => $annonce->categorie_id
                ])
            </div>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'label' => 'Titre de l\'annonce', 
                    'name' => 'libelle', 
                    'type' => 'text', 
                    'value' => $annonce->libelle
                ])
            </div>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'label' => 'Détail de l\'annonce', 
                    'name' => 'detail', 
                    'type' => 'textarea', 
                    'value' => $annonce->detail
                ])
            </div>
            <div class="row">
                @include('shared.input', [
                    'class' => 'col', 
                    'label' => 'Photo de l\'annonce', 
                    'name' => 'photo', 
                    'type' => 'file'
                ])
            </div>
            <div class="row zone-options d-flex flex-row-reverse py-2">
                <div>
                    <span class="btn btn-default" onclick="ajout(this)">
                        <i class="fas fa-fw fa-plus" title="Ajouter un champ"></i>
                    </span >
                </div>
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
                    'value' => $annonce->address
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
                    @if($annonce->exists)
                        Modifer
                    @else
                        Publier
                    @endif
                </button>
            </div>
        </div>
    </div>
</form>
<script>
    const container = document.getElementById('detailAnnonce');
    let i = 0;
    function ajout(){
        i = i+1;
        let div = document.createElement('div');
        let divrow = document.createElement('div');
        let divcolrow = document.createElement('div');
        let select = document.createElement('select');
        let input = document.createElement('input');
        let option = document.createElement('option');
        divrow.classList = ['row']
        div.classList = ['form-group col'];
        select.classList = ['form-select form-control'];
        select.name="select"+i;
        let tt = ["Diplôme","Prix","Surface","Nombre de pièces"];
        let j=1;
        for (j = j-1; j < tt.length; j++) {
            option.text = tt[j];
            option.value = tt[j];
            select.options.add(option,j)
        } 
        
        container.appendChild(divrow).appendChild(div).appendChild(select);
        input.classList = ['form-control'];
        input.placeholder = 'Saisir la valeur';
        divcolrow.classList = ['col row']
        div.classList = ['form-group col'];
        
        divrow.append(divcolrow);
        divcolrow.appendChild(input)
        
    }
    
</script>