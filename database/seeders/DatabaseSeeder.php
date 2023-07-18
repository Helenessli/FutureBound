<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scholarship;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Scholarship::create([
            'name' => 'George F. Jones Scholarship',
            'amount' => 'not identified',
            'criteria' => 'Applicants must be Involved & devoted to the game but does not have to be an active player; involved in helping expand the game of rugby in inner cities, first nation reserves, small towns, immigrant communities; currently involved in the sport. Criteria: contributions to the rugby community, how you have helped expand the game, other volunteer activities, academic achievements, most important accomplishments, future goals',
            'deadline' => '2023-09-01',
            'url' => 'https://canadianrugbyfoundation.ca/index.php/support-a-fund/scholarship/george-f-jones/',
            'created_at' => '2023-07-01',
            'updated_at' => '2023-07-01'
         ]);
        
        /*\App\Models\Scholarship::factory(10)->create();

         \App\Models\Scholarship::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);*/
    }
}
