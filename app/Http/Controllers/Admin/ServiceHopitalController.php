<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceHopitalFormRequest;
use App\Models\Offre;
use App\Models\ServiceHopital;
use Illuminate\Http\Request;

class ServiceHopitalController extends Controller
{
    public function index()
    {
        return view('admin.offres.index', [
            'services' => Offre::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new Offre();
        return view('admin.offres.form', [
            'service' => new Offre(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceHopitalFormRequest $request)
    {
        $service = Offre::create($request->validated());
        return to_route('admin.services.index')->with('success', 'Cet enrégistrement a bien été créé.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Offre $service)
    {
        return view('admin.offres.form', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ServiceHopitalFormRequest $request, Offre $service)
    {
        $service->update($request->validated());
        return to_route('admin.services.index')->with('success', 'Cet enrégistrement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Offre $service)
    {
        $service->delete();
        return to_route('admin.services.index')->with('success', 'Cet enrégistrement à bien été supprimé.');
    }
}
