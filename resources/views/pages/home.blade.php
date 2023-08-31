@extends('pages.layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-9 col-content">
        <span class="d-block p-2 my-2 bg-light">
            <h4>Bienvenus sur le portail d'Allakro</h4>
        </span>
        <div class="main-inner-page">
            <div class="row">
                <div class="col-12">
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-transparent">
                            <a href="{{ route('page.competences.index') }}">
                                <img src="/images/service.jpg" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-footer bg-transparent card-action">
                            <a href="{{ route('page.competences.index') }}" class="d-block">
                                Compétences
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-transparent">
                            <a href="{{ route('page.activites.index') }}">
                                <img src="/images/service.jpg" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-footer bg-transparent card-action">
                            <a href="{{ route('page.activites.index') }}" class="d-block">
                                Activités et métiers
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-transparent">
                            <a href="{{ route('page.interets.index') }}">
                                <img src="/images/service.jpg" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-footer bg-transparent card-action">
                            <a href="{{ route('page.interets.index') }}" class="d-block">
                                Centres d'intéret
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-transparent">
                            <a href="{{ route('page.offres.index') }}">
                                <img src="/images/megaphone.jpg" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-footer bg-transparent card-action">
                            <a href="{{ route('page.offres.index') }}" class="d-block">
                                Offres
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-transparent">
                            <a href="{{ route('page.declarations.index') }}">
                                <img src="/images/declarations.jpg" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-footer bg-transparent card-action">
                            <a href="{{ route('page.declarations.index') }}" class="d-block">
                                Actualités
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-transparent">
                            <a href="{{ route('page.declarations.index') }}">
                                <img src="/images/declarations.jpg" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-footer bg-transparent card-action">
                            <a href="{{ route('page.declarations.index') }}" class="d-block">
                                Projets
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-transparent">
                            <a href="{{ route('page.pharmacies.index') }}">
                                <img src="/images/pharmacie.jpg" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-footer bg-transparent card-action">
                            <a href="{{ route('page.pharmacies.index') }}" class="d-block">
                                Pharmacie
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-transparent">
                            <a href="{{ route('page.hopitaux.index') }}">
                                <img src="/images/hopital.jpg" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-footer bg-transparent card-action">
                            <a href="{{ route('page.hopitaux.index') }}" class="d-block">
                                Hôpitaux
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3 col-aside"></div>
</div>

@endsection