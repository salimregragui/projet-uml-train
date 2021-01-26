<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }

    </style>

    <style>
        body {
            font-family: 'Nunito';
        }

    </style>
</head>

<body class="antialiased">
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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container">
        <form action="{{ route('trajets.recherche') }}" method="POST">
            @csrf
            <h2>Chercher un trajet</h2>
            <div class="form-group">
                <label for="exampleFormControlInput1">Heure départ</label>
                <input type="datetime-local" class="form-control" name="heure-depart" />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Gare départ</label>
                <select name="gare-depart" class="form-control">
                    @foreach ($gares as $gare)
                        <option value="{{ $gare->id }}">{{ $gare->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Gare arrivée</label>
                <select name="gare-arrivee" class="form-control">
                    @foreach ($gares as $gare)
                        <option value="{{ $gare->id }}">{{ $gare->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
        </form>
    </div>

    <div class="container">
        <h1>Tous les trajets</h1>
        <a class="btn btn-success" href="{{ route('trajets.create') }}">Créer un trajet</a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gare départ</th>
                    <th scope="col">Gare arrivée</th>
                    <th scope="col">Train</th>
                    <th scope="col">Heure départ</th>
                    <th scope="col">Heure arrivée</th>
                    <th scope="col">retard</th>
                    <th scope="col">Trajet direct</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trajets as $trajet)
                    <tr>
                        <th scope="row">{{ $trajet->id }}</th>
                        <td>{{ $trajet->gareDepart->nom }}</td>
                        <td>{{ $trajet->gareArrivee->nom }}</td>
                        <td>{{ $trajet->train->nom }} {{ $trajet->train->code }}</td>
                        <td>
                            @if ($trajet->retard > 0)
                                <span style="color:red;">{{ $trajet->heure_depart }}</span><br />
                                {{ date('Y-m-d H:i:s', strtotime('+' . $trajet->retard . ' minutes', strtotime($trajet->heure_depart))) }}
                            @else
                                {{ $trajet->heure_depart }}
                            @endif
                        </td>
                        <td>
                            @if ($trajet->retard > 0)
                                <span style="color:red;">{{ $trajet->heure_arrivee }}</span><br />
                                {{ date('Y-m-d H:i:s', strtotime('+' . $trajet->retard . ' minutes', strtotime($trajet->heure_arrivee))) }}
                            @else
                                {{ $trajet->heure_arrivee }}
                            @endif
                        </td>
                        <td>{{ $trajet->retard }} min</td>
                        @if (count($trajet->correspondances) > 0)
                            <td>non(<a style="color: #718096;" href="{{ route('trajets.show', $trajet->id) }}">Voir
                                    toutes les correspondances</a>)</td>
                        @else
                            <td>Oui</td>
                        @endif
                        @if (auth()->check())
                            <td><button onclick="showUpdate({{ $trajet->id }})">Gérer</button></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="modal"
        style="position:fixed; min-height:100vh;min-width:100vw;top:0;left:0; background-color:rgba(0,0,0,0.4);display:flex;justify-content:center;align-items:center;">
        <div style="background-color:white; width: 600px; height: 200px;text-align:center;">
            <button type="button" onclick="hideModal()">X</button>
            <form action="{{ route('trajets.update') }}" method="POST">
                @csrf
                @method("PATCH")
                <input type="hidden" name="id" id="retardInput" />
                <input type="number" name="retard" style="border: 1px solid black;" />
                <button type="submit">Ajouter retard</button>
            </form>

            <form action="{{ route('trajets.destroy') }}" method="POST">
                @csrf
                @method("DELETE")
                <input type="hidden" name="id" id="trajetId" />
                <button type="submit">Supprimer trajet</button>
            </form>
        </div>
    </div>
    </div>

    <script>
        document.getElementById("modal").hidden = true;

        function hideModal() {
            document.getElementById("modal").hidden = true;
        }

        function showUpdate(id) {
            document.getElementById("modal").hidden = false;
            document.getElementById("retardInput").value = id;
            document.getElementById("trajetId").value = id;
        }

    </script>
</body>

</html>
