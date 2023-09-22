<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portfolio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- Style --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-purple-200">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen flex-col">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-black hover:drop-shadow-md focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-black hover:drop-shadow-md focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-black hover:drop-shadow-md focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="text-center">
                <h1 class="text-5xl sm:text-7xl font-mono font-extrabold text-gray-900 drop-shadow-xl hover:scale-105 transition cursor-default">Benvenuto nel Portfolio!</h1>
                <p class="mt-4 text-lg text-black">Sei nella pagina principale, effettua l'accesso per apportare modifiche.</p>
                <p class="mt-4 text-lg text-black">Da qui puoi solo visualizzare i progetti se non sei loggato.</p>
            </div>

            <div class="container mx-auto p-6">
                <h1 class="text-3xl font-semibold mb-6">Elenco dei Progetti</h1>
        
                @if(count($projects) > 0)
                    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($projects as $project)
                            <li class="bg-gray-200 rounded-lg shadow-md overflow-hidden cursor-pointer transition hover:scale-105">
                                <div class="p-4">
                                    <h2 class="text-xl font-semibold mb-2">{{ $project->title }}</h2>
                                    <p class="text-gray-600">{{ $project->description }}</p>
                                    <p class="text-gray-600">{{ $project->date }}</p>
                                    <p class="text-gray-600"><strong>Tipologia: </strong>{{ $project->type->name }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600">Nessun progetto disponibile al momento.</p>
                @endif
            </div>
        </div>
    </body>
</html>
