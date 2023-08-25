@include('shared.header')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-green navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
          class="fas fa-th-large"></i></a>
    </li>
  </ul>
  <a href="/home" class="btn btn-primary">
    Retour à la page d'accueil 
  </a>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @php
      $route = request()->route()->getName()
    @endphp
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
          <a href="{{ route('admin.acteurs.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'acteurs.') ])>
            <i class="nav-icon fas fa-th"></i>
            <p>
              Acteurs
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.activites.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'activites.') ]) >
            <i class="nav-icon fas fa-th"></i>
            <p>
              Activités
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.pharmacies.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'pharmacies.')]) >
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pharmacies
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.hopitals.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'hopitals.')]) >
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
              <a href="{{ route('admin.amenages.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'amenages.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>Aménagements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.demenages.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'demenages.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>Déménagements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.naissances.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'naissances.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Naissances
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.decedes.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'decedes.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Décès
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <p>
              Paramètres
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.bons.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'bons.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>Bons médicaux</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.services.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'services.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>Services médicaux</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.secteurs.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'secteurs.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Secteurs d'activité
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.niveaux.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'niveaux.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Niveaux scolaires
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.categories.index')}}" @class([ 'nav-link', 'active' => str_contains($route,  'categories.')]) >
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Catégories
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

<div class="content-wrapper">
    <div class="main-content py-4 p-3" id="portailContent" style="min-height: 212px;">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
              @yield('title')
              </h1>
            </div>
            <div class="col-sm-6">
              
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger">
              <ul class="my-0">
                @foreach($errors->all() as $error )
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>

          @endif
            @yield('content')
        </div>
      </section>
        
    </div>

    
</div>
<footer class="main-footer bg-indigo0">
  <div class="container">
    <em>&copy; 2022</em>
  </div>
</footer>
@include('shared.footer')
