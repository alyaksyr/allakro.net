<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjetFormRequest;
use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.projets.index', [
            'projets' => Projet::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projet= new Projet();
        return view('admin.projets.form', [
            'projet' => new Projet(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetFormRequest $request)
    {
        $projet = Projet::create($request->validated());
        return to_route('admin.projets.index')->with('success', 'L\'enrégistement a bien été créé !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Projet $projet)
    {
        return view('admin.projets.form', [
            'projet' => $projet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ProjetFormRequest $request, Projet $projet)
    {
        $projet->update($request->validated());
        return to_route('admin.projets.index')->with('success', 'L\'enrégistement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Projet $projet)
    {
        $projet->delete();
        return to_route('admin.projets.index')->with('success', 'L\'enrégistement a bien été supprimé !');
    }
}
