<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SousCategorieFormRequest;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    public function index()
    {
        return view('admin.sous_categories.index', [
            'sous_categories' => SousCategorie::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sous_categories = new SousCategorie();
        return view('admin.sous_categories.form', [
            'sous_categories' => new SousCategorie(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SousCategorieFormRequest $request)
    {
        $sous_categories = SousCategorie::create($request->validated());
        return to_route('admin.sous_categories.index')->with('success', 'L\'enrégistement a bien été créé !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(SousCategorie $sous_categories)
    {
        return view('admin.sous_categories.form', [
            'sous_categories' => $sous_categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SousCategorieFormRequest $request, SousCategorie $sous_categories)
    {
        $sous_categories->update($request->validated());
        return to_route('admin.sous_categories.index')->with('success', 'L\'enrégistement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(SousCategorie $sous_categories)
    {
        $sous_categories->delete();
        return to_route('admin.sous_categories.index')->with('success', 'L\'enrégistement a bien été supprimé !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function garde(SousCategorie $sous_categories)
    {
        return view('admin.sous_categories.garde', [
            'sous_categories' => $sous_categories,
        ]);
    }
}
