<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elenco dei Progetti') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Modifica Progetto</h1>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <form action="{{ route('projects.update', ['project' => $project]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Titolo</label>
                        <input type="text" name="title" id="title" value="{{ $project->title }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold mb-2">Descrizione</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ $project->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-gray-600 font-medium">Data</label>
                        <input type="date" id="date" name="date" value="{{ $project->date }}"
                            class="form-input mt-1 block w-full rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="cover_image" class="block text-gray-600 font-medium">Immagine di copertina</label>
                        <input type="file" id="cover_image" name="cover_image" class="form-input mt-1 block w-full rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="type_id" class="block text-gray-600 font-medium">Tipo</label>
                        <select name="type_id" class="form-input mt-1 block w-full rounded-lg">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        @foreach ($technologies as $technology)
                            <div class="flex items-center mb-4">
                                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                                    class="mr-2"
                                    {{ in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <label for="technologies-{{ $technology->id }}">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>                    

                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">Salva
                            Modifiche</button>
                        <a href="{{ route('projects.show', ['project' => $project]) }}"
                            class="text-gray-500 ml-4 hover:underline">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
