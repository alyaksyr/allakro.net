<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActiviteFormRequest;
use App\Models\Acteur;
use App\Models\Activite;
use App\Models\Secteur;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class ActiviteController extends Controller
{
    
    public function index()
    {
        return view('admin.activites.index', [
            'activites' => Activite::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activite = new Activite();
        return view('admin.activites.create', [
            'activite' => $activite,
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
    public function store(ActiviteFormRequest $request, Activite $activite)
    {
    
        $user_role = \Illuminate\Support\Facades\Auth::user()->role;

        $activite->create($this->loadPhoto($request, new Activite()));
        if ($user_role != 'Membre') {
            return to_route('admin.acteurs.show', ['acteur' => $$activite->acteur])->with('success', 'L\'activité a bien été ajoutéé !');
        }
        return redirect()->intended(route('home'))
        ->with('success', 'L\'activité a bien été ajoutéé !');
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Activite $activite)
    {
        return view('admin.activites.create', [
            'activite' => $activite,
            'acteur' => Acteur::find($activite->acteur_id),
            'secteurs' => Secteur::pluck('libelle', 'libelle'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ActiviteFormRequest $request, Activite $activite)
    {
        $user_role = \Illuminate\Support\Facades\Auth::user()->role;

        $activite->update($this->loadPhoto($request, $activite));

        if ($user_role !='Membre') {
            return to_route('admin.acteurs.show',['acteur' => $activite->acteur_id])->with('success', 'L\'activite à bien été modifiée !');
        }
        return redirect()->intended(route('home'))->with('success', 'L\'activité a bien été modifiéé !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Activite $activite)
    {
        $user_role = \Illuminate\Support\Facades\Auth::user()->role;

        if ($activite->photo) {
            Storage::disk('public')->delete($activite->photo);
         }
        $activite->delete();

        if ($user_role != 'Membre') {
            return to_route('admin.acteurs.show',['acteur' => $activite->acteur])->with('success', 'L\'activite à bien été supprimée !');
        }
        return redirect()->intended(route('home'))->with('success', 'L\'activite à bien été supprimée !');
    
    }

    private function loadPhoto(ActiviteFormRequest $request, Activite $activite): array {
        
        $data = $request->validated();
        $user_role = \Illuminate\Support\Facades\Auth::user()->role;

        /** @var UploadedFile|null $photo */
        $photo = $request->validated('photo');
        
        if ($photo==null || $photo->getError()) {
            return $data;
        }
        if ($activite->photo) {
           Storage::disk('public')->delete($activite->photo);
        }
        $data['photo']=$photo->store('images/activites/'.$activite->acteur->id, 'public');
        return $data;
    }


}
