<li class="list-group-item">
    <div class="d-flex pb-2 justify-content-between align-item-end">
        <div class="list-group-first">
            nom
        </div>
        <div class="list-group-middle">
            {{ $activite->libelle }}
        </div>
        <div class="d-flex pb-2 gap-2 w-100 justify-content-end">
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
          </div>
        </li>