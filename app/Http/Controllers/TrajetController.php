<?php

namespace App\Http\Controllers;

use App\Models\Correspondance;
use App\Models\Gare;
use App\Models\Train;
use App\Models\Trajet;
use Illuminate\Http\Request;

class TrajetController extends Controller
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
        $trajets = Trajet::all();
        $gares = Gare::all();

        return view('trajets.index', compact('trajets', 'gares'));
    }

    public function recherche(Request $request)
    {
        $trajetsRecherche = Trajet::where('gare_depart', $request->get('gare-depart'))->where('gare_arrivee', $request->get('gare-arrivee'))->where('heure_depart', '>=', $request->get('heure-depart'))->get();

        return redirect()->route('trajets.index')->with(['trajetsRecherche' => $trajetsRecherche]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gares = Gare::all();
        $trains = Train::all();

        return view('trajets.create', compact('gares', 'trains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTrajet = Trajet::create([
            'gare_depart' => $request->get('gareDepart'),
            'gare_arrivee' => $request->get('gareArrivee'),
            'train_id' => $request->get('train'),
            'heure_depart' => $request->get('heureDepart'),
            'heure_arrivee' => $request->get('heureArrivee'),
            'retard' => "0"
        ]);

        if ($request->has('hasCorrespondances')) {
            $correspondanceCreer = Correspondance::create([
                'gare_depart' => $request->get('gareDepartCorrespondance')[0],
                'gare_arrivee' => $request->get('gareArriveeCorrespondance')[0],
                'gare_precedente' => $newTrajet->gare_depart,
                'train_id' => $request->get('trainCorrespondance')[0],
                'heure_depart' => $request->get('heureDepartCorrespondance')[0],
                'heure_arrivee' => $request->get('heureArriveeCorrespondance')[0],
                'idTrajet' => $newTrajet->id
            ]);;
            for ($i = 1; $i < count($request->get('gareDepartCorrespondance')); $i++) {
                global $correspondanceCreer;

                if ($i == count($request->get('gareDepartCorrespondance')) - 1) {
                    $correspondanceCreer = Correspondance::create([
                        'gare_depart' => $request->get('gareDepartCorrespondance')[$i],
                        'gare_arrivee' => $newTrajet->gare_arrivee,
                        'gare_precedente' => $newTrajet->gare_depart,
                        'train_id' => $request->get('trainCorrespondance')[$i],
                        'heure_depart' => $request->get('heureDepartCorrespondance')[$i],
                        'heure_arrivee' => $request->get('heureArriveeCorrespondance')[$i],
                        'idTrajet' => $newTrajet->id
                    ]);
                } else {
                    $correspondanceCreer = Correspondance::create([
                        'gare_depart' => $request->get('gareDepartCorrespondance')[$i],
                        'gare_arrivee' => $request->get('gareArriveeCorrespondance')[$i],
                        'gare_precedente' => $correspondanceCreer->gare_depart,
                        'train_id' => $request->get('trainCorrespondance')[$i],
                        'heure_depart' => $request->get('heureDepartCorrespondance')[$i],
                        'heure_arrivee' => $request->get('heureArriveeCorrespondance')[$i],
                        'idTrajet' => $newTrajet->id
                    ]);
                }
            }
        }

        return redirect()->route('trajets.index')->with('success','trajet créer avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trajet  $trajet
     * @return \Illuminate\Http\Response
     */
    public function show(Trajet $trajet)
    {
        return view('trajets.show', compact('trajet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trajet  $trajet
     * @return \Illuminate\Http\Response
     */
    public function edit(Trajet $trajet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trajet  $trajet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $trajet = Trajet::find($request->get('id'));

        $trajet->retard = $request->get('retard');
        $trajet->save();

        $trajets = Trajet::all();

        return view('trajets.index', compact('trajets'))->with('success', 'Retard ajouté avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trajet  $trajet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $trajet = Trajet::find($request->get('id'));
        $trajet->delete();

        $trajets = Trajet::all();

        return view('trajets.index', compact('trajets'))->with('success', 'trajet supprimé avec succès.');
    }
}
