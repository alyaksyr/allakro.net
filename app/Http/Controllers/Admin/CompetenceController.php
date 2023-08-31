<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompetenceFormRequest;
use App\Models\Acteur;
use App\Models\Competence;
use App\Models\Secteur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.competences.index', [
            'competences' => Competence::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competence = new Competence();
        return view('admin.competences.create', [
            'competence' => new Competence(),
            'acteur' => Acteur::find($_REQUEST['acteur_id']),
            'secteurs' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceFormRequest $request)
    {
        $competence = new Competence();

        $user_role = \Illuminate\Support\Facades\Auth::user()->role;
        // if ($user_role != 'Membre') {

        //     $acteur = Acteur::find($request->input('acteur_id'));
        // }
        // else {
        //     $contact = \Illuminate\Support\Facades\Auth::user()->contact;
        //     $acteur = DB::table('acteurs')->where("contact",$contact)->get()->first();
        // }
        // // dd($acteur);
        $competence->create($this->loadPhoto($request, new Competence()));

        if ($user_role !='Membre') {
            return to_route('admin.acteurs.show', ['acteur' => $competence->acteur])->with('success', 'La compétence a bien été ajoutéé !');
        }
        return redirect()->intended(route('home'))->with('success', 'La compétence a bien été ajoutéé !');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competence $competence)
    {
        return view('admin.competences.create', [
            'competence' => $competence,
            'acteur' => Acteur::find($competence->acteur_id),
            'secteurs' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompetenceFormRequest $request, Competence $competence)
    {
        $user_role = \Illuminate\Support\Facades\Auth::user()->role;
        $competence->update($this->loadPhoto($request, $competence));
        if ($user_role !='Membre') {
            return to_route('admin.acteurs.show', ['acteur' => $competence->acteur_id])
            ->with('success', 'La compétence a bien été modifiée !');
        }
        return redirect()->intended(route('home'))
        ->with('success', 'La compétence a bien été modifiée !');
        // return to_route('admin.acteurs.show',['acteur' => $competence->acteur_id])->with('success', 'La competence à bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competence $competence)
    {
        $user_role = \Illuminate\Support\Facades\Auth::user()->role;
        
        if ($competence->photo) {
            Storage::disk('public')->delete($competence->photo);
         }
        $competence->delete();
        if ($user_role != 'Membre') {
            return to_route('admin.acteurs.show', ['acteur' => $competence->acteur_id])
            ->with('success', 'La compétence a bien été supprimée !');
        }
        return redirect()->intended(route('home'))
        ->with('success', 'La compétence a bien été supprimée !');

        return redirect()->intended(route('home'))->with('success', 'La compétence a bien été suppriméé !');
        // return to_route('admin.acteur.show',['acteur' => $acteur])->with('success', 'Cet enrégistrement à bien été supprimé.');
    }

    private function loadPhoto(CompetenceFormRequest $request, Competence $competence): array {
        
        $data = $request->validated();
        $user_role = \Illuminate\Support\Facades\Auth::user()->role;

        /** @var UploadedFile|null $photo */
        $photo = $request->validated('photo');
        
        if ($photo==null || $photo->getError()) {
            return $data;
        }
        if ($competence->photo) {
           Storage::disk('public')->delete($competence->photo);
        }
        $data['photo']=$photo->store('images/competences/'.$competence->acteur->id, 'public');
        return $data;
    }

}
