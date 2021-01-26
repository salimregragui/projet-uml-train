<?php

namespace App\Http\Controllers;

use App\Models\Gare;
use App\Models\Trajet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $trajets = Trajet::all();
        $gares = Gare::all();

        return view('home', compact('trajets', 'gares'));
    }
}
