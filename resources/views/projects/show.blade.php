<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elenco dei Progetti') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Dettagli del Progetto</h1>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-4">
                <img src="{{ asset('storage/images/'. $project->cover_image ) }}" alt="{{ $project->title }}">
                <h2 class="text-xl font-semibold mb-2">{{ $project->title }}</h2>
                <p class="text-gray-600">{{ $project->description }}</p>
                <p>Tipologia: {{ $project->type->name }}</p>
                <ul class="flex flex-wrap list-disc mt-2">
                    @foreach ($project->technologies as $technology)
                        <li class="flex flex-row items-center">
                            <span class="mr-2">
                                <span class="bg-blue-500 text-white py-1 px-2 rounded-xl">{{ $technology->name }}</span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bg-gray-100 p-4 border-t border-gray-200">
                <a href="{{ route('projects.edit', ['project' => $project]) }}"
                    class="text-blue-500 hover:underline">Modifica</a>

                <div class="ml-auto">
                    <form action="{{ route('projects.destroy', ['project' => $project]) }}" method="POST"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
