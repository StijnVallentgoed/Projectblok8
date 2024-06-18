<?php

namespace App\Http\Controllers;

use App\Models\Nieuwsbericht;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class NieuwsberichtController extends Controller
{

    public function create()
{
    $categorieen = Categorie::all();
    $users = User::all();
    $tags = Tag::all(); // Fetch all tags to populate the dropdown

    return view('nieuwsbericht.create', compact('categorieen', 'users', 'tags'));
}
public function destroy($id)
{
    $nieuwsbericht = Nieuwsbericht::findOrFail($id);
    $nieuwsbericht->delete();

    return redirect()->route('nieuws.index')
                     ->with('success', 'Nieuwsbericht verwijderd.');
}



public function show(Nieuwsbericht $nieuwsbericht)
{
    return view('nieuwsbericht.show', compact('nieuwsbericht'));
}


public function index()
{
    $nieuwsberichten = Nieuwsbericht::with('categorie', 'user', 'tags')->get();
    return view('nieuwsbericht.index', compact('nieuwsberichten'));
}
    

public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'titel' => 'required|string|max:255',
        'beschrijving' => 'required|string',
        'categorie_id' => 'required|exists:categorie,categorieid',
        'user_id' => 'required|exists:users,userid',
        'tags' => 'array', // Ensure tags is an array
    ]);

    // Create the nieuwsbericht
    $nieuwsbericht = Nieuwsbericht::create([
        'titel' => $validatedData['titel'],
        'beschrijving' => $validatedData['beschrijving'],
        'categorie_id' => $validatedData['categorie_id'],
        'user_id' => $validatedData['user_id'],
    ]);

    // Attach tags to the nieuwsbericht
    if (isset($validatedData['tags'])) {
        $nieuwsbericht->tags()->attach($validatedData['tags']);
    }

    
    return redirect()->route('nieuws.index')->with('success', 'Nieuwsbericht is succesvol toegevoegd.');
}
public function edit($id)
{
    $nieuwsbericht = Nieuwsbericht::findOrFail($id);
    $categorieen = Categorie::all(); 
   

    
    $tags = []; 

    return view('nieuwsbericht.edit', compact('nieuwsbericht', 'categorieen', 'tags'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'titel' => 'required|string|max:255',
        'beschrijving' => 'required|string',
        'categorie_id' => 'required|exists:categories,id', 
    ]);

 
    $nieuwsbericht = Nieuwsbericht::findOrFail($id);

    $nieuwsbericht->update($validatedData);


    return redirect()->route('nieuws.edit', ['nieuwsbericht' => $nieuwsbericht->id])
                     ->with('success', 'Nieuwsbericht bijgewerkt successfully.');
}
}