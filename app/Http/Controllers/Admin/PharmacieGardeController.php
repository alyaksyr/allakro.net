<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PharmacieGardeFormRequest;
use App\Models\Pharmacie;
use App\Models\PharmacieGarde;
use Illuminate\Http\Request;

class PharmacieGardeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd(Pharmacie::find($$id));
        $garde = new PharmacieGarde();
        // $pahamecie = $request->pharmacie;

        return view('admin.pharmacies.garde', [
            'garde' => new PharmacieGarde(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacieGardeFormRequest $request, Pharmacie $pharmacie)
    {
        $pharmacie = Pharmacie::find($request->input('pharmacie_id'));
        $garde = $request->validated();
        $pharmacie->gardes()->create($garde);
        return to_route('admin.pharmacies.index')->with('success', 'L\'enrégistement a bien été créé !');
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
