<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BonFormRequest;
use App\Models\Bon;
use Illuminate\Http\Request;

class BonController extends Controller
{
    public function index()
    {
        return view('admin.bons.index', [
            'bons' => Bon::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bon = new Bon();
        return view('admin.bons.form', [
            'bon' => new Bon(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BonFormRequest $request)
    {
        $bon = Bon::create($request->validated());
        return to_route('admin.bons.index')->with('success', 'L\'enrégistement a bien été créé !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Bon $bon)
    {
        return view('admin.bons.form', [
            'bon' => $bon,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(BonFormRequest $request, Bon $bon)
    {
        $bon->update($request->validated());
        return to_route('admin.bons.index')->with('success', 'L\'enrégistement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Bon $bon)
    {
        $bon->delete();
        return to_route('admin.bons.index')->with('success', 'L\'enrégistement a bien été supprimé !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function garde(Bon $bon)
    {
        return view('admin.bons.garde', [
            'bon' => $bon,
        ]);
    }
}
