<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenageFormRequest;
use App\Models\Amenage;
use App\Models\Declaration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AmenageController extends Controller
{
    public function index()
    {
        return view('admin.amenages.index', [
            'declarations' => Declaration::where('type', 'amenage')->orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenage = new Amenage();
        return view('admin.amenages.form', [
            'amenage' => new Amenage(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmenageFormRequest $request)
    {
        $declaration = new Declaration();
        $declaration->type = 'amenage';
        $declaration->slug = Str::slug(('amenagement de '.$request->input('nom')),'-');
        $declaration->user_id = 1;
        $declaration->status = 1;
        $declaration->save();
        $declaration->amenage()->create($request->validated());
        return to_route('admin.amenages.index')->with('success', 'La déclaration du déménagement a bien été enrégistrée !');
    }
    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Amenage $amenage)
    {
        return view('admin.amenages.form', [
            'amenage' => $amenage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(AmenageFormRequest $request, Amenage $amenage)
    {
        $amenage->update($request->validated());
        return to_route('admin.amenages.index')->with('success', 'La déclaration du déménagement a bien été modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Amenage $amenage)
    {
        $amenage->delete();
        return to_route('admin.amenages.index')->with('success', 'La déclaration du déménagement a bien été supprimée !');
    }
}
