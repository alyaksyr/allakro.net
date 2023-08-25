<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use App\Models\Proposition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class PropositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.propositions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $options = Categorie::orderBy('libelle', 'asc')->pluck('libelle', 'id');
        // dd($options);
        return view('pages.propositions.create', [
            'proposition' => new Proposition(),
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
        $user = new User();
        $acteur = new Acteur();
        $proposition = new Proposition();

        $validated = $request->validate([
            'nom' => 'required|min:2',
            'genre' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'contact' => 'required|unique:acteurs|min:2',
            'address' => 'required|min:2',
            'email' => 'required|email',
            'libelle' => 'required|min:6',
            'competence' => 'required',
            'detail' => 'required',
        ]);

        $user->email = $request->input('email');
        $user->name = $request->input('nom');
        $user->password = Hash::make($request->input('password'));

        $acteur->genre = $request->input('genre');
        $acteur->nom = $request->input('nom');
        $acteur->contact = $request->input('contact');
        $acteur->address = $request->input('address');
        $acteur->resident = $request->input('resident');

        $proposition->libelle = $request->input('libelle');
        $proposition->detail = $request->input('detail');
        $proposition->competence = $request->input('competence');
        $proposition->etat = 0;
        $proposition->status = 0;

        $user->save();

        $acteur->save();

        $acteur->propositions()->save($proposition);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.propositions.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
