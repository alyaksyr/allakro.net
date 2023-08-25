<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DecedeFormRequest;
use App\Models\Decede;
use App\Models\Declaration;
use Illuminate\Http\Request;

class DecedeController extends Controller
{
    public function index()
    {
        return view('admin.decedes.index', [
            'declarations' => Declaration::where('type', 'deces')->orderBy('created_at', 'desc')->paginate(25),
            // 'decedes' => Decede::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $decede = new Decede();
        return view('admin.decedes.form', [
            'decede' => new Decede(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DecedeFormRequest $request)
    {
        $decede = Decede::create($request->validated());
        return to_route('admin.decedes.index')->with('success', 'Cet enrégistrement a bien été créé.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Decede $decede)
    {
        return view('admin.decedes.form', [
            'decede' => $decede,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(DecedeFormRequest $request, Decede $decede)
    {
        
        $decede->update($request->validated());
        return to_route('admin.decedes.index')->with('success', 'Cet enrégistrement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Decede $decede)
    {
        $decede->delete();
        return to_route('admin.decedes.index')->with('success', 'Cet enrégistrement à bien été supprimé.');
    }
}
