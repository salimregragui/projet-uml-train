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
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
        @endif
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('trains.store') }}" method="POST">
            @csrf
            <h1>Nouveau train</h1>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input name="nom" type="text" class="form-control" id="nom" aria-describedby="nom"
                    placeholder="Entrez le nom du train">
            </div>
            <div class="form-group">
                <label for="ville">Code</label>
                <input name="code" type="text" class="form-control" id="code" aria-describedby="code"
                    placeholder="Entrez le code du train">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>

    </html>
