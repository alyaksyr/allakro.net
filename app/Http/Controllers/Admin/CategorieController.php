<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategorieFormRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Categorie::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = new Categorie();
        return view('admin.categories.form', [
            'categorie' => new Categorie(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieFormRequest $request)
    {
        $categorie = Categorie::create($request->validated());
        return to_route('admin.categories.index')->with('success', 'L\'enrégistement a bien été créé !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Categorie $categorie)
    {
        return view('admin.categories.form', [
            'categorie' => $categorie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(CategorieFormRequest $request, Categorie $categorie)
    {
        $categorie->update($request->validated());
        return to_route('admin.categories.index')->with('success', 'L\'enrégistement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return to_route('admin.categories.index')->with('success', 'L\'enrégistement a bien été supprimé !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function garde(Categorie $categorie)
    {
        return view('admin.categories.garde', [
            'categorie' => $categorie,
        ]);
    }
}
