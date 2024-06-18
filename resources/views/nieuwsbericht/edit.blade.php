<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold mb-4">Bewerk Nieuwsbericht</h1>
    </x-slot>

<div class="flex justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <form action="{{ route('nieuws.update', ['nieuwsbericht' => $nieuwsbericht->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titel" class="block text-gray-700">Titel</label>
                <input type="text" name="titel" id="titel" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $nieuwsbericht->titel }}" required>
            </div>
            <div class="mb-4">
                <label for="beschrijving" class="block text-gray-700">Beschrijving</label>
                <textarea name="beschrijving" id="beschrijving" rows="4" class="w-full p-2 border border-gray-300 rounded-lg" required>{{ $nieuwsbericht->beschrijving }}</textarea>
            </div>
            <div class="mb-4">
                <label for="categorie_id" class="block text-gray-700">Categorie</label>
                <select name="categorie_id" id="categorie_id" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    @foreach ($categorieen as $categorie)
                        <option value="{{ $categorie->id }}" {{ $nieuwsbericht->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->titel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tags" class="block text-gray-700">Tags</label>
                <select name="tags[]" id="tags" class="w-full p-2 border border-gray-300 rounded-lg" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $nieuwsbericht->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->titel }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Opslaan</button>
        </form>
    </div>
</div>
</x-app-layout>