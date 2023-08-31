<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceHopitalFormRequest;
use App\Models\Hopital;
use App\Models\Offre;
use App\Models\ServiceHopital;
use Illuminate\Http\Request;

class ServiceHopitalController extends Controller
{
    public function index()
    {
        return view('admin.hopitals.show', [
            'services' => ServiceHopital::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new ServiceHopital();
        return view('admin.hopitals.form-service', [
            'service' => new Offre(),
            'hopital' => Hopital::find($_REQUEST['hopital_id']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceHopitalFormRequest $request, Hopital $hopital)
    {
        $hopital = Hopital::find($request->input('hopital_id'));
        $service = $request->validated();
        $hopital->services()->create($service);
        return to_route('admin.hopitals.show', ['hopital' => $hopital])->with('success', 'L\'enrégistement a bien été créé !');
        
        // $service = Offre::create($request->validated());
        // return to_route('admin.services.index')->with('success', 'Cet enrégistrement a bien été créé.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(ServiceHopital $service)
    {
        return view('admin.hopitals.form-service', [
            'service' => $service,
            'hopital' => Hopital::find($service->hopital_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ServiceHopitalFormRequest $request, ServiceHopital $service)
    {
        $service->update($request->validated());
        return to_route('admin.hopitals.show',['hopital' => $service->hopital_id])->with('success', 'Cet enrégistrement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(ServiceHopital $service)
    {
        $service->delete();
        return to_route('admin.hopitals.show')->with('success', 'Cet enrégistrement à bien été supprimé.');
    }
}
