<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrainManager</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trajets.index') }}">Voir les trajets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gares.index') }}">Voir les gares</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trains.index') }}">Voir les trains</a>
                        </li>
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trajets.index') }}">Voir les trajets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gares.index') }}">Voir les gares</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trains.index') }}">Voir les trains</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> erreurs dans vos inputs.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('trajets.store') }}" method="POST">
            @csrf
            <h1>Nouveau trajet</h1>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="gare départ">Gare départ</label>
                    <select class="form-control form-control-lg" name="gareDepart">
                        @foreach ($gares as $gare)
                            <option value="{{ $gare->id }}">{{ $gare->nom }} | {{ $gare->ville }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="gare arrivée">Gare arrivée</label>
                    <select class="form-control form-control-lg" name="gareArrivee">
                        @foreach ($gares as $gare)
                            <option value="{{ $gare->id }}">{{ $gare->nom }} | {{ $gare->ville }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="Train">Train</label>
                <select class="form-control form-control-lg" name="train">
                    @foreach ($trains as $train)
                        <option value="{{ $train->id }}">{{ $train->nom }} {{ $train->code }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Heure départ">Heure départ</label>
                    <input type="datetime-local" class="form-control" id="heureDepart" name="heureDepart">
                </div>
                <div class="form-group col-md-6">
                    <label for="Heure arrivée">Heure arrivée</label>
                    <input type="datetime-local" class="form-control" id="heureArrivee" name="heureArrivee">
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="0" id="defaultCheck1" name="hasCorrespondances">
                <label class="form-check-label" for="defaultCheck1">
                    Ce trajet a des correspondances
                </label>
            </div>

            <div id="correspondances">
                <h3>Toutes les correspondances</h3>
                <button type="button" class="btn btn-primary" onclick="ajouterCorrespondance()">Ajouter
                    correspondance</button>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>

        <script>
            const checkbox = document.getElementById("defaultCheck1");
            const correspondances = document.getElementById("correspondances");
            correspondances.hidden = true;
            let nbrCorrespondances = 0;

            function ajouterCorrespondance() {
                nbrCorrespondances++;
                correspondances.insertAdjacentHTML('beforeend', `
                            <div class="container">
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="gare départ">Gare départ</label>
                                            <select class="form-control form-control-lg" name="gareDepartCorrespondance[]">
                                                @foreach ($gares as $gare)
                                                    <option value="{{ $gare->id }}">{{ $gare->nom }} | {{ $gare->ville }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="gare arrivée">Gare arrivée</label>
                                            <select class="form-control form-control-lg" name="gareArriveeCorrespondance[]">
                                                @foreach ($gares as $gare)
                                                    <option value="{{ $gare->id }}">{{ $gare->nom }} | {{ $gare->ville }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Train">Train</label>
                                        <select class="form-control form-control-lg" name="trainCorrespondance[]">
                                            @foreach ($trains as $train)
                                                <option value="{{ $train->id }}">{{ $train->nom }} {{ $train->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Heure départ">Heure départ</label>
                                        <input type="datetime-local" class="form-control" id="correspondanceHeureDepart" name="heureDepartCorrespondance[]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Heure arrivée">Heure arrivée</label>
                                        <input type="datetime-local" class="form-control" id="correspondanceHeureArrivee" name="heureArriveeCorrespondance[]">
                                    </div>
                                </div>
                                <hr/>
                            </div>
                            `);
            }

            function loadCorrespondances() {
                for (let i = 0; i < nbrCorrespondances; i++) {
                    correspondances.insertAdjacentHTML('beforeend', `
                            <div class="container">
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="gare départ">Gare départ</label>
                                            <select class="form-control form-control-lg" name="gareDepartCorrespondance[]">
                                                @foreach ($gares as $gare)
                                                    <option value="{{ $gare->id }}">{{ $gare->nom }} | {{ $gare->ville }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="gare arrivée">Gare arrivée</label>
                                            <select class="form-control form-control-lg" name="gareArriveeCorrespondance[]">
                                                @foreach ($gares as $gare)
                                                    <option value="{{ $gare->id }}">{{ $gare->nom }} | {{ $gare->ville }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Train">Train</label>
                                        <select class="form-control form-control-lg" name="trainCorrespondance[]">
                                            @foreach ($trains as $train)
                                                <option value="{{ $train->id }}">{{ $train->nom }} {{ $train->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Heure départ">Heure départ</label>
                                        <input type="datetime-local" class="form-control" id="correspondanceHeureDepart" name="heureDepartCorrespondance[]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Heure arrivée">Heure arrivée</label>
                                        <input type="datetime-local" class="form-control" id="correspondanceHeureArrivee" name="heureArriveeCorrespondance[]">
                                    </div>
                                </div>
                                <hr/>
                            </div>
                            `);
                }
            }

            checkbox.addEventListener("change", () => {
                if (checkbox.checked) {
                    correspondances.hidden = false;
                    nbrCorrespondances = 1;
                    loadCorrespondances();
                } else {
                    correspondances.hidden = true;
                    nbrCorrespondances = 0;
                    correspondances.innerHTML = "";
                }
            });

        </script>
    </body>

    </html>
