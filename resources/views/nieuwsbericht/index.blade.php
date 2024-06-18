<x-app-layout>
<x-slot name="header">
<h1 class="text-2xl font-bold mb-4">Nieuwsberichten Nova College</h1>
<a href="{{ route('nieuws.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Maak je eigen Nieuwsbericht</a>


    @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
</x-slot>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($nieuwsberichten as $nieuwsbericht)
        <div class="bg-white p-4 rounded-lg shadow-md border border-gray-200" id="row_{{ $nieuwsbericht->nieuwsid }}">
            <h2 class="text-xl font-bold mb-2">{{ $nieuwsbericht->titel }}</h2>
            <p class="text-gray-700 mb-2">{{ $nieuwsbericht->beschrijving }}</p>
            <p class="text-gray-500 mb-2">{{ $nieuwsbericht->categorie->titel }}</p>
            <p class="text-gray-500 mb-4">{{ $nieuwsbericht->user->name }}</p>
            
            <!-- Display Tags -->
            <div class="mb-2">
                Tags:
                @foreach ($nieuwsbericht->tags as $tag)
                    <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-md">{{ $tag->titel }}</span>
                @endforeach
            </div>
            
            <div class="flex justify-between">
                <a href="{{ route('nieuws.show', $nieuwsbericht->nieuwsid) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Toon</a>
                
                @if (Auth::id() === $nieuwsbericht->user_id)
                    
                    <form action="{{ route('nieuws.destroy', $nieuwsbericht->nieuwsid) }}" method="POST" id="delete_form_{{ $nieuwsbericht->nieuwsid }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteRow('{{ $nieuwsbericht->nieuwsid }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Verwijderen</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>

<script>
    function deleteRow(nieuwsid) {
        if (confirm('Weet je zeker dat je dit nieuwsbericht wilt verwijderen?')) {
            document.getElementById('delete_form_' + nieuwsid).submit();
        }
    }
</script>
</x-app-layout>