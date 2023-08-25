@include('shared.header')

<div class="header shadow-sm bg-body rounded">
        <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light navbar-green">
        <div class="container">
            <a href="/" class="navbar-brand">
                <img src="/images/logo22.png" alt="Allakro.net" width="90" height="40">
            </a>
            <!-- Left navbar links -->

            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('propositions.create')}}" class="nav-link">Publier une offre</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('declaration.declarer.naissance')}}" class="nav-link">Déclarer une naissance</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('declaration.declarer.deces')}}" class="nav-link">Déclarer un décès</a>
                </li>
            </ul>
                <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <a href="{{route('admin.acteurs.index')}}" class="btn btn-primary">
                Admin
            </a>
        </div>
    </nav>
<!-- /.navbar -->
</div>

<div class="main-content py-4">
    <div class="container">
        @yield('content')
    </div>  
</div>

<footer class="bg-indigo">
    <div class="container">
        <em>&copy; 2022</em>
    </div>
</footer>
@include('shared.footer')
        
    