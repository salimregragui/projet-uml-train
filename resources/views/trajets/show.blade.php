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

    <h2>Trajet de {{ $trajet->gareDepart->nom }} vers {{ $trajet->gareArrivee->nom }}</h2>
    @if ($trajet->retard > 0)
        <h5>Le train a {{ $trajet->retard }} min de retards</h5>
    @else
        <h5>Le train est dans les temps</h5>
    @endif
    <div class="card" style="width: 500px; margin-bottom: 20px;">
        <div class="card-body">
            <h5 class="card-title">Départ : {{ $trajet->gareDepart->nom }} <br/>(
                @if ($trajet->retard > 0)
                    <span style="color:red;text-decoration:line-through;">{{ $trajet->heure_depart }}</span>
                    {{ date('Y-m-d H:i:s', strtotime('+' . $trajet->retard . ' minutes', strtotime($trajet->heure_depart))) }}
                @else
                    {{ $trajet->heure_depart }}
                @endif
                )
            </h5>
            <h5 class="card-title">Arrivée : {{ $trajet->correspondances[0]->gareDepart->nom }}
                <br/>(
                    @if ($trajet->retard > 0)
                        <span style="color:red;text-decoration:line-through;">{{  $trajet->correspondances[0]->heure_arrivee  }}</span>
                        {{ date('Y-m-d H:i:s', strtotime('+' . $trajet->retard . ' minutes', strtotime( $trajet->correspondances[0]->heure_arrivee ))) }}
                    @else
                        {{  $trajet->correspondances[0]->heure_arrivee  }}
                    @endif
                    )</h5>
        </div>
    </div>

    @foreach ($trajet->correspondances as $correspondance)
        <div class="card" style="width: 500px; margin-bottom: 20px;">
            <div class="card-body">
                <h5 class="card-title">Départ : {{ $correspondance->gareDepart->nom }}
                    <br/>(
                        @if ($trajet->retard > 0)
                            <span style="color:red;text-decoration:line-through;">{{  $correspondance->heure_arrivee  }}</span>
                            {{ date('Y-m-d H:i:s', strtotime('+' . $trajet->retard . ' minutes', strtotime( $correspondance->heure_arrivee ))) }}
                        @else
                            {{  $correspondance->heure_arrivee  }}
                        @endif
                        )</h5>
                <h5 class="card-title">Arrivée : {{ $correspondance->gareArrivee->nom }}
                    <br/>(
                        @if ($trajet->retard > 0)
                            <span style="color:red;text-decoration:line-through;">{{  $correspondance->heure_depart  }}</span>
                            {{ date('Y-m-d H:i:s', strtotime('+' . $trajet->retard . ' minutes', strtotime( $correspondance->heure_depart ))) }}
                        @else
                            {{  $correspondance->heure_depart  }}
                        @endif
                        )
                </h5>
            </div>
        </div>
    @endforeach

    <div class="card" style="width: 500px; margin-bottom: 20px;">
        <div class="card-body">
            <h5 class="card-title">Départ : {{ $correspondance->gareDepart->nom }} <br/>(
                @if ($trajet->retard > 0)
                    <span style="color:red;text-decoration:line-through;">{{  $correspondance->heure_depart  }}</span>
                    {{ date('Y-m-d H:i:s', strtotime('+' . $trajet->retard . ' minutes', strtotime( $correspondance->heure_depart ))) }}
                @else
                    {{  $correspondance->heure_depart  }}
                @endif
                )
            </h5>
            <h5 class="card-title">Arrivée : {{ $trajet->gareArrivee->nom }}
                <br/>(
                @if ($trajet->retard > 0)
                    <span style="color:red;text-decoration:line-through;">{{  $trajet->heure_arrivee  }}</span>
                    {{ date('Y-m-d H:i:s', strtotime('+' . $trajet->retard . ' minutes', strtotime( $trajet->heure_arrivee ))) }}
                @else
                    {{  $trajet->heure_arrivee  }}
                @endif
                )
            </h5>
        </div>
    </div>
</body>

</html>
