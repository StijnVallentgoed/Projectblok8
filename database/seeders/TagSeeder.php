<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            [
                'titel' => 'School Events',
                'beschrijving' => 'News about upcoming school events',
                'aanmaakdatum' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titel' => 'Sports',
                'beschrijving' => 'Updates on school sports activities',
                'aanmaakdatum' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titel' => 'Academic Achievements',
                'beschrijving' => 'Announcements regarding academic achievements',
                'aanmaakdatum' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titel' => 'Student Clubs',
                'beschrijving' => 'Information about various student clubs',
                'aanmaakdatum' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'titel' => 'Community Outreach',
                'beschrijving' => 'Updates on community service initiatives',
                'aanmaakdatum' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert tags into the database
        DB::table('tags')->insert($tags);
    }
}
