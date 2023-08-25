<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SecteurActivitesFormRequest;
use App\Models\Secteur;
use Illuminate\Http\Request;

class SecteursActivitesController extends Controller
{
    public function index()
    {
        return view('admin.secteurs.index', [
            'secteurs' => Secteur::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteur = new Secteur();
        return view('admin.secteurs.form', [
            'secteur' => new Secteur(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecteurActivitesFormRequest $request)
    {
        $secteur = Secteur::create($request->validated());
        return to_route('admin.secteurs.index')->with('success', 'L\'enrégistement a bien été créé !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Secteur $secteur)
    {
        return view('admin.secteurs.form', [
            'secteur' => $secteur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SecteurActivitesFormRequest $request, Secteur $secteur)
    {
        $secteur->update($request->validated());
        return to_route('admin.secteurs.index')->with('success', 'L\'enrégistement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Secteur $secteur)
    {
        $secteur->delete();
        return to_route('admin.secteurs.index')->with('success', 'L\'enrégistement a bien été supprimé !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function garde(Secteur $secteur)
    {
        return view('admin.secteurs.garde', [
            'secteur' => $secteur,
        ]);
    }
}
