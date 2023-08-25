<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PharmacieFormRequest;
use App\Models\Bon;
use App\Models\Pharmacie;
use Illuminate\Http\Request;

class PharmacieController extends Controller
{
    public function index()
    {
        return view('admin.pharmacies.index', [
            'pharmacies' => Pharmacie::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pharmacie = new Pharmacie();
        return view('admin.pharmacies.form', [
            'pharmacie' => new Pharmacie(),
            'bons' => Bon::pluck('libelle','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacieFormRequest $request)
    {
        $pharmacie = Pharmacie::create($request->validated());
        $pharmacie->bons()->sync($request->validated('bons'));
        return to_route('admin.pharmacies.index')->with('success', 'L\'enrégistement a bien été créé !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Pharmacie $pharmacie)
    {

        return view('admin.pharmacies.form', [
            'pharmacie' => $pharmacie,
            'bons' => Bon::pluck('libelle','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(PharmacieFormRequest $request, Pharmacie $pharmacie)
    {
        $pharmacie->update($request->validated());
        $pharmacie->bons()->sync($request->validated('bons'));
        return to_route('admin.pharmacies.index')->with('success', 'L\'enrégistement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Pharmacie $pharmacie)
    {
        $pharmacie->delete();
        return to_route('admin.pharmacies.index')->with('success', 'L\'enrégistement a bien été supprimé !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function garde(Pharmacie $pharmacie)
    {
        dd($pharmacie);
        return view('admin.pharmacies.garde', [
            'pharmacie' => $pharmacie,
        ]);
    }
}
