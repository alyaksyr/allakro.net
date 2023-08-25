<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActiviteFormRequest;
use App\Models\Activite;
use App\Models\Secteur;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    
    public function index()
    {
        return view('admin.activites.index', [
            'activites' => Activite::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activite = new Activite();
        return view('admin.activites.form', [
            'activite' => new Activite(),
            'options' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActiviteFormRequest $request)
    {
        $activite = Activite::create($request->validated());
        return to_route('admin.activites.index')->with('success', 'L\'activite à bien été créée !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Activite $activite)
    {
        return view('admin.activites.form', [
            'activite' => $activite,
            'options' => Secteur::pluck('libelle', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ActiviteFormRequest $request, Activite $activite)
    {
        $activite->update($request->validated());
        return to_route('admin.activites.index')->with('success', 'L\'activite à bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Activite $activite)
    {
        $activite->delete();
        return to_route('admin.activites.index')->with('success', 'L\'activite à bien été supprimée !');
    }
}
