<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NaissanceFormRequest;
use App\Models\Declaration;
use App\Models\Naissance;
use Illuminate\Http\Request;

class NaissanceController extends Controller
{
    public function index()
    {
        return view('admin.naissances.index', [
            'declarations' => Declaration::where('type', 'naissance')->orderBy('created_at', 'desc')->paginate(25)
            // 'naissances' => Naissance::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $naissance = new Naissance();
        return view('admin.naissances.form', [
            'naissance' => new Naissance(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NaissanceFormRequest $request)
    {
        $naissance = Naissance::create($request->validated());
        return to_route('admin.naissances.index')->with('success', 'La naissance à bien été créée !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Naissance $naissance)
    {
        // $decl = Declaration::find($naissance->declaration_id);
        // dd($decl);
        return view('admin.naissances.form', [
            'naissance' => $naissance,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(NaissanceFormRequest $request, Naissance $naissance)
    {
        $naissance->update($request->validated());
        return to_route('admin.naissances.index')->with('success', 'La déclaration de naissance à bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Naissance $naissance)
    {
        $naissance->delete();
        return to_route('admin.naissances.index')->with('success', 'La naissance à bien été supprimée !');
    }
}
