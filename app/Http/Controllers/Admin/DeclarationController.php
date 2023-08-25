<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Declaration;
use Illuminate\Http\Request;

class DeclarationController extends Controller
{
    public function index()
    {
        return view('admin.success', [
            'declarations' => Declaration::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $declaration = new Declaration();
        return view('admin.declarations.form', [
            'declaration' => new Declaration(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $declaration = Declaration::create($request->validated());
        return to_route('admin.declarations.index')->with('success', 'Cet enrégistrement a bien été créé.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Declaration $declaration)
    {
        return view('admin.declarations.form', [
            'declaration' => $declaration,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Declaration $declaration)
    {
        $validated = $request->validate([
            'status' => 'required|boolean',
        ]);
        $declaration->update($validated);
        return to_route('admin.declarations.index')->with('success', 'Cet enrégistrement a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Declaration $declaration)
    {
        $declaration->delete();
        return to_route('admin.declarations.index')->with('success', 'Cet enrégistrement à bien été supprimé.');
    }
}
