<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use App\Models\Activite;
use App\Models\Competence;
use App\Models\Interet;
use App\Models\Niveau;
use App\Models\Secteur;
use App\Models\TrancheAge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $contact = \Illuminate\Support\Facades\Auth::user()->contact;
        $profile = Acteur::where("contact",$contact)->first();
        
        return view('compte.profile.show', [
            'competence' => new Competence(),
            'interet' => new Interet(),
            'activite' => new Activite(),
            'acteur' => $profile,
           
        ]);

    }


    public function edit(Acteur $profile){
        return view('compte.profile.form', [
            'acteur' => $profile,
            'ages' => TrancheAge::pluck('tranche', 'tranche'),
            'niveaux' => Niveau::pluck('niveau', 'niveau'),
        ]);
    }

    public function create_activite(){
        return view('compte.activites.form', [
            'activite' => new Activite(),
            'acteur' => Acteur::find($_REQUEST['profile']),
            'secteurs' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    public function create_competence(){
        return view('compte.competences.form', [
            'competence' => new Competence(),
            'acteur' => Acteur::find($_REQUEST['profile']),
            'secteurs' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    public function create_interet(){
        return view('compte.interets.form', [
            'interet' => new Interet(),
            'acteur' => Acteur::find($_REQUEST['profile']),
        ]);
    }

    public function edit_activite(Activite $activite){
        return view('compte.activites.form', [
            'activite' => $activite,
            'acteur' => $activite->acteur,
            'secteurs' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    public function edit_competence(Competence $competence){
        return view('compte.competences.form', [
            'competence' => $competence,
            'acteur' => $competence->acteur,
            'secteurs' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    public function edit_interet(Interet $interet){
        return view('compte.interets.form', [
            'interet' => $interet,
            'acteur' =>$interet->acteur,
        ]);
    }
}
