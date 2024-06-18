<?php

namespace App\Http\Controllers;

use App\Models\Commentaar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'bericht' => 'required|string',
            'nieuwsbericht_id' => 'required|exists:nieuwsbericht,nieuwsid',
        ]);

        $user = Auth::user();

        $commentaar = new Commentaar();
        $commentaar->bericht = $request->bericht;
        $commentaar->aanmaakdatum = now(); // Or use Carbon\Carbon for more customization
        $commentaar->usersid = $user->userid; // Assign authenticated user's ID
        $commentaar->nieuwsbericht_id = $request->nieuwsbericht_id;
        $commentaar->save();

        return redirect()->back()->with('success', 'Commentaar geplaatst!');
    }
    public function destroy($id)
    {
        $commentaar = Commentaar::findOrFail($id);

        // Check if the authenticated user is the owner of the comment
        if (Auth::id() !== $commentaar->user_id) {
            return redirect()->back()->with('error', 'Je hebt geen toestemming om dit commentaar te verwijderen.');
        }

        $commentaar->delete();

        return redirect()->back()->with('success', 'Commentaar succesvol verwijderd.');
    }
}
