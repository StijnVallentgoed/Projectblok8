<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all categories
        $categories = Categorie::all();
        
        // Return view with categories data
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return view for creating a new category
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'titel' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'aanmaakdatum' => 'required|date',
        ]);

        // Create a new category
        Categorie::create($request->all());

        // Redirect to the index page with success message
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified category.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        // Return view with the specified category data
        return view('categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        // Return view for editing the specified category
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        // Validate the request data
        $request->validate([
            'titel' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'aanmaakdatum' => 'required|date',
        ]);

        // Update the category
        $categorie->update($request->all());

        // Redirect to the index page with success message
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        // Delete the category
        $categorie->delete();

        // Redirect to the index page with success message
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
