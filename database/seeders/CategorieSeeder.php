<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Nieuwsbericht;

class CategorieSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'titel' => 'Politiek',
                'beschrijving' => 'Nieuwsberichten over regeringen, verkiezingen, wetgeving, politieke ontwikkelingen en internationale betrekkingen.',
                'aanmaakdatum' => now(),
            ],
            [
                'titel' => 'Economie',
                'beschrijving' => 'Berichtgeving over markttrends, financiële resultaten, werkgelegenheid, handelsovereenkomsten en economische beleidsmaatregelen.',
                'aanmaakdatum' => now(),
            ],
            [
                'titel' => 'Technologie',
                'beschrijving' => 'Nieuws over innovaties, gadgets, softwareontwikkelingen, startups, en de impact van technologie op verschillende sectoren.',
                'aanmaakdatum' => now(),
            ],
            [
                'titel' => 'Gezondheid',
                'beschrijving' => 'Berichten over gezondheidszorg, medisch onderzoek, pandemieën, gezondheidswetenschappen en welzijn.',
                'aanmaakdatum' => now(),
            ],
            [
                'titel' => 'Milieu & Duurzaamheid',
                'beschrijving' => 'Nieuwsberichten over klimaatverandering, milieubeleid, natuurbehoud, duurzame energiebronnen en ecologische impact.',
                'aanmaakdatum' => now(),
            ],
        ];

        // Voeg de categorieën toe aan de database
        DB::table('categorie')->insert($categories);
    }
}

