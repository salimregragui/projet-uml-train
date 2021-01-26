<?php

namespace App\Http\Controllers;

use App\Models\Gare;
use Illuminate\Http\Request;

class GareController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gares = Gare::all();

        return view('gares.index', compact('gares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'ville' => 'required',
        ]);

        Gare::create($request->all());

        return redirect()->route('gares.index')->with('success','gare créer avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gare  $gare
     * @return \Illuminate\Http\Response
     */
    public function show(Gare $gare)
    {
        return "hey";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gare  $gare
     * @return \Illuminate\Http\Response
     */
    public function edit(Gare $gare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gare  $gare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gare $gare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gare  $gare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gare $gare)
    {
        //
    }
}
