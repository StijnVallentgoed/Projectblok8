<?php




namespace App\Http\Controllers;

use App\Models\Nieuwsbericht;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index()
    {
        // Retrieve all nieuwsberichten
        $nieuwsberichten = Nieuwsbericht::all();

        // Return a view to display the nieuwsberichten
        return view('index', compact('nieuwsberichten'));
    }

    
    
}
