<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <span class="brand-text font-weight-bold">Allakro.net</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin.acteurs.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Acteurs
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.activites.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Activités
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.pharmacies.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pharmacies
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.hopitals.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Hôpitaux
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <p>
              Déclarations
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.amenages.index')}}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>Aménagements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.demenages.index')}}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>Déménagements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.naissances.index')}}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Naissances
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.decedes.index')}}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Décès
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <p>
              Paramètres
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.bons.index')}}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>Bons médicaux</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.services.index')}}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>Services médicaux</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.secteurs.index')}}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Secteurs d'activité
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.niveaux.index')}}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Niveaux scolaires
                </p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


@php
  $route = $request->route()->getName;
@endphp