<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elenco dei Progetti') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        @if(count($projects) > 0)
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $project)
                    <li class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $project->title }}</h2>
                            <p class="text-gray-600">{{ $project->description }}</p>
                            <p>Tipologia: {{ $project->type->name }}</p>
                        </div>
                        <div class="bg-gray-100 p-4 border-t border-gray-200 flex">
                            <a href="{{ route('projects.show', ['project' => $project]) }}" class="text-blue-500 hover:underline">Dettagli</a>
                            <div class="ml-auto">
                                <a href="{{ route('projects.edit', ['project' => $project]) }}" class="text-blue-500 hover:underline mr-4">Modifica</a>
                                <form action="{{ route('projects.destroy', ['project' => $project]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Elimina</button>
                                </form>
                            </div>
                            
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 mt-4 inline-block hover:bg-blue-600 rounded-lg">Crea un nuovo progetto</a>
        @else
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Nessun progetto disponibile.") }}
                </div>
            </div>
            <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 mt-4 inline-block hover:bg-blue-600 rounded-lg">Crea un nuovo progetto</a>
        </div>
        @endif
    </div>
</x-app-layout>
