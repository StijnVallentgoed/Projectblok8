<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Nieuw Nieuwsbericht</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <strong class="font-bold">Oeps!</strong> Er zijn problemen met uw invoer.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('nieuws.store') }}" method="POST" class="w-full max-w-lg mx-auto">
            @csrf
            
            <div class="mb-4">
                <label for="titel" class="block text-sm font-semibold text-gray-600">Titel:</label>
                <input type="text" id="titel" name="titel" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Titel" value="{{ old('titel') }}">
            </div>
            
            <div class="mb-4">
                <label for="beschrijving" class="block text-sm font-semibold text-gray-600">Beschrijving:</label>
                <textarea id="beschrijving" name="beschrijving" class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" style="height: 150px;" placeholder="Beschrijving">{{ old('beschrijving') }}</textarea>
            </div>
            
            <div class="mb-4">
                <label for="categorie_id" class="block text-sm font-semibold text-gray-600">Categorie:</label>
                <select id="categorie_id" name="categorie_id" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Selecteer een categorie</option>
                    @foreach ($categorieen as $categorie)
                        <option value="{{ $categorie->categorieid }}" {{ old('categorie_id') == $categorie->categorieid ? 'selected' : '' }}>{{ $categorie->titel }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="tags" class="block text-sm font-semibold text-gray-600">Tags:</label>
                <select id="tags" name="tags[]" multiple class="form-multiselect mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->tagid }}">{{ $tag->titel }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Remove the user_id select -->
            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
            
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Opslaan</button>
            </div>
            
        </form>
    </div>

    <!-- Initialize Select2 script -->
    @push('scripts')
        <script>
            // Ensure the DOM is fully loaded before executing scripts
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Select2 on the tags select element
                $('#tags').select2({
                    placeholder: 'Selecteer tags', // Placeholder text
                    tags: true, // Allow user to add new tags not in the list
                    tokenSeparators: [',', ' '], // Define separators for tags
                    width: '100%', // Adjust the width as needed
                });
            });
        </script>
    @endpush
</x-app-layout>
