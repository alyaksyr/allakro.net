<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DemenageFormRequest;
use App\Models\Declaration;
use App\Models\Demenage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DemenageController extends Controller
{
    public function index()
    {
        return view('admin.demenages.index', [
            'declarations' => Declaration::where('type', 'demenage')->orderBy('created_at', 'desc')->paginate(25),
            // 'demenages' => Demenage::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demenage = new Demenage();
        return view('admin.demenages.form', [
            'demenage' => new Demenage(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemenageFormRequest $request)
    {
        $declaration = new Declaration();
        $declaration->type = 'demenage';
        $declaration->slug = Str::slug(('demenagement de '.$request->input('nom')),'-');
        $declaration->user_id = 1;
        $declaration->status = 1;
        $declaration->save();
        $declaration->demenage()->create($request->validated());
        return to_route('admin.demenages.index')->with('success', 'La déclaration du déménagement a bien été enrégistrée !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Demenage $demenage)
    {
        return view('admin.demenages.form', [
            'demenage' => $demenage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(DemenageFormRequest $request, Demenage $demenage)
    {
        $demenage->update($request->validated());
        return to_route('admin.demenages.index')->with('success', 'La déclaration du déménagement a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Demenage $demenage)
    {
        $demenage->delete();
        return to_route('admin.demenages.index')->with('success', 'La déclaration du déménagement a bien été supprimée !');
    }
}
