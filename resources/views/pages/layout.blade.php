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
                    <a href="{{route('compte.offres.create')}}" class="nav-link">Publier une offre</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('compte.declaration.naissance')}}" class="nav-link">Déclarer une naissance</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('compte.declaration.deces')}}" class="nav-link">Déclarer un décès</a>
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    @auth
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Root')
                            <a href="{{ route('admin.acteurs.index') }}" class="nav-link btn btn-primary">
                                Admin
                            </a>
                        @else
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('compte.profile') }}" class="dropdown-item">
                                Mes informations
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                Mes déclarations
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                Mes offres
                            </a>
                            <div class="dropdown-divider"></div>
                            <form class="nav-item" action="{{route('logout')}}" method="post">
                                @csrf 
                                @method('delete')
                                <button class="nav-link">
                                    Se déconnecter
                                </button>
                            </form>
                        </div>
                        @endif
                    @endauth

                    @guest
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                            Mon compte
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{route('login')}}" class="dropdown-item">
                                Se connecter
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('register')}}" class="dropdown-item">
                                S'inscrire
                            </a>
                        </div>
                    @endguest
                    
                </li>
            </ul>
            
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
        
    