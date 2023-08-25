<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HopitalFormRequest;
use App\Models\Bon;
use App\Models\Hopital;
use App\Models\Offre;
use Illuminate\Http\Request;

class HopitalController extends Controller
{
    public function index()
    {
        return view('admin.hopitals.index', [
            'hopitals' => Hopital::orderBy('created_at', 'desc')->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hopital = new Hopital();
        return view('admin.hopitals.form', [
            'hopital' => new Hopital(),
            'offres' => Offre::pluck('libelle','id'),
            'bons' => Bon::pluck('libelle','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HopitalFormRequest $request)
    {
        $hopital = Hopital::create($request->validated());
        $hopital->offres()->sync($request->validated('offres'));
        $hopital->bons()->sync($request->validated('bons'));
        return to_route('admin.hopitals.index')->with('success', 'L\'enrégistement a bien été créé !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Hopital $hopital)
    {
        return view('admin.hopitals.form', [
            'hopital' => $hopital,
            'offres' => Offre::pluck('libelle','id'),
            'bons' => Bon::pluck('libelle','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(HopitalFormRequest $request, Hopital $hopital)
    {
        $hopital->update($request->validated());
        $hopital->offres()->sync($request->validated('offres'));
        $hopital->bons()->sync($request->validated('bons'));
        return to_route('admin.hopitals.index')->with('success', 'L\'enrégistement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Hopital $hopital)
    {
        $hopital->delete();
        return to_route('admin.hopitals.index')->with('success', 'L\'enrégistement a bien été supprimé !');
    }
}
