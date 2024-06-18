<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold mb-4">{{ $nieuwsbericht->titel }}</h1>
    </x-slot>

    <div class="flex justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
            <h1 class="text-3xl font-bold mb-4">{{ $nieuwsbericht->titel }}</h1>
            <div class="text-gray-700 mb-6">
                <p class="mb-2"><strong>Beschrijving:</strong> {{ $nieuwsbericht->beschrijving }}</p>
                <p class="mb-2"><strong>Categorie:</strong> {{ $nieuwsbericht->categorie->titel }}</p>
                <p class="mb-2"><strong>Auteur:</strong> {{ $nieuwsbericht->user->voornaam }} {{ $nieuwsbericht->user->achternaam }}</p>
                <p class="mb-2"><strong>Aanmaakdatum:</strong> {{ $nieuwsbericht->created_at }}</p>
            </div>

            <!-- Display Tags -->
            <div class="mb-4">
                <strong>Tags:</strong>
                @foreach ($nieuwsbericht->tags as $tag)
                    <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-md">{{ $tag->titel }}</span>
                @endforeach
            </div>

            <!-- Display existing comments -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-4">Commentaar</h2>
                @foreach($nieuwsbericht->commentaar as $comment)
                    <div class="bg-gray-100 p-4 rounded-lg mb-4">
                        <p class="text-gray-700 mb-2">{{ $comment->bericht }}</p>
                        <p class="text-gray-500 text-sm">Geplaatst door: {{ $comment->user->voornaam }} {{ $comment->user->achternaam }}</p>
                        <p class="text-gray-500 text-sm">Geplaatst op: {{ $comment->aanmaakdatum }}</p>
                        
                        <!-- Delete button (only show if the authenticated user is the creator of the comment) -->
                        @if (Auth::id() === $comment->user_id)
                            <form action="{{ route('commentaar.destroy', $comment->commentaarid) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Verwijder</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Add new comment form -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Voeg een commentaar toe</h2>
                @if ($message = Session::get('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <form action="{{ route('commentaar.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nieuwsbericht_id" value="{{ $nieuwsbericht->nieuwsid }}">
                    <div class="mb-4">
                        <label for="bericht" class="block text-gray-700">Commentaar</label>
                        <textarea name="bericht" id="bericht" rows="4" class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Plaatsen</button>
                </form>
            </div>


        </div>
    </div>
</x-app-layout>
