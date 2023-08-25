<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\DecedeFormRequest;
use App\Http\Requests\Admin\NaissanceFormRequest;
use App\Models\Decede;
use App\Models\Declaration;
use App\Models\Naissance;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeclarationController extends Controller
{
    
    public function index(){
        return view('pages.declarations.index');
    }
    
    public function naissance(){
        $naissance = new Naissance();
        return view('pages.declarations.naissances.form', [
            'naissance' => $naissance,
        ]);
    }

    public function deces(){
        $decede = new Decede();
        return view('pages.declarations.deces.form', [
            'decede' => $decede,
        ]);
    }

    public function store(Request $request){
        $declaration = new Declaration();
        $naissance = new Naissance();
        $decede = new Decede();

        $declaration->type = $request->input('_type');
        $declaration->slug = Str::slug(($request->input('_type').' de '.$request->input('nom')),'-');
        $declaration->status = 0;
        $declaration->user_id = $request->input('_user_id');
        $declaration->save();
        if ($request->input('_type') == "naissance") {
            $naissance = $request->input();
            $declaration->naissance()->create($naissance);
        } else {
            $decede = $request->input();
            $declaration->decede()->create($decede);
        }
        
        return to_route('declaration.index')->with('success', 'Cet enrégistrement a bien été créé.');
    }

}
