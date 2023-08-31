<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActeurFormRequest;
use App\Models\Acteur;
use App\Models\Activite;
use App\Models\Competence;
use App\Models\DomaineActivite;
use App\Models\Interet;
use App\Models\Niveau;
use App\Models\Secteur;
use App\Models\TrancheAge;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ActeurController extends Controller
{

    public function index()
    {
        
        return view('admin.acteurs.index', [
            'acteurs' => Acteur::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd($this->selectOptions['niveau'][0]);
        $acteur = new Acteur();
        return view('admin.acteurs.create', [
            'acteur' => new Acteur(),
            'ages' => TrancheAge::pluck('tranche', 'tranche'),
            'niveaux' => Niveau::pluck('niveau', 'niveau'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActeurFormRequest $request)
    {
        $acteur = Acteur::create($request->validated());
        return to_route('admin.acteurs.show',['acteur' => $acteur])->with('success', 'L\'acteur à bien été créé !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function show($acteur)
    {
        $user = \Illuminate\Support\Facades\Auth::user()->role;
        return view('admin.acteurs.show', [
            
            'competence' => new Competence(),
            'interet' => new Interet(),
            'activite' => new Activite(),
            'acteur' => Acteur::find($acteur),
            'competences' => Acteur::find($acteur)->competences()->orderBy('created_at', 'desc')->paginate(25),
            'interets' => Acteur::find($acteur)->interets()->orderBy('created_at', 'desc')->paginate(25),
            'activites' => Acteur::find($acteur)->activites()->orderBy('created_at', 'desc')->paginate(25),
        ]);
    }


    public function edit(Acteur $acteur)
    {
        return view('admin.acteurs.create', [
            'acteur' => $acteur,
            'ages' => TrancheAge::pluck('tranche', 'tranche'),
            'niveaux' => Niveau::pluck('niveau', 'niveau'),
            'secteurs' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ActeurFormRequest $request, Acteur $acteur)
    {
        $acteur->update($request->validated());
        return to_route('admin.acteurs.show', ['acteur' => $acteur])->with('success', 'L\'acteur à bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Acteur $acteur)
    {
        $acteur->delete();
        return to_route('admin.acteurs.index')->with('success', 'L\'acteur à bien été supprimé !');
    }
}
