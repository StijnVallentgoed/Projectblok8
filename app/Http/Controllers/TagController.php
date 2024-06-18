<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        // Logic to fetch all tags
    }

    public function create()
    {
        // Show form to create a new tag
    }

    public function store(Request $request)
    {
        // Validate and store a new tag
    }

    public function show(Tag $tag)
    {
        // Show a specific tag
    }

    public function edit(Tag $tag)
    {
        // Show form to edit a tag
    }

    public function update(Request $request, Tag $tag)
    {
        // Validate and update a tag
    }

    public function destroy(Tag $tag)
    {
        // Delete a tag
    }
}
