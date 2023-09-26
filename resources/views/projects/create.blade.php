<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crea Progetto') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-4">
                <label for="title" class="block text-gray-600 font-medium">Titolo del Progetto</label>
                <input type="text" id="title" name="title" class="form-input mt-1 block w-full rounded-lg" required autofocus>
            </div>
    
            <div class="mb-4">
                <label for="description" class="block text-gray-600 font-medium">Descrizione</label>
                <textarea id="description" name="description" class="form-textarea mt-1 block w-full rounded-lg" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-600 font-medium">Data</label>
                <input type="date" id="date" name="date" class="form-input mt-1 block w-full rounded-lg">
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
                            class="mr-2">
                        <label for="technologies-{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Crea Progetto
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
