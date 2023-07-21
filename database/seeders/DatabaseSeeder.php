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
            'name' => 'Union of Health and Environment Workers Scholarships',
            'amount' => '$3,000',
            'criteria' => 'Applicants must be dependents of UHEW members in good standing, planning to undertake post-secondary training. Essay required',
            'deadline' => '2023-08-23',
            'url' => 'https://uhew-stse.ca/honours-and-awards/uhew-scholarships/',
            'created_at' => '2023-07-21',
            'updated_at' => '2023-07-21'
         ]);

         Scholarship::create([
            'name' => 'Government Services Union Bursaries',
            'amount' => '$2,000',
            'criteria' => 'Applicants must be dependents of UHEW members in good standing, planning to undertake post-secondary training. Essay required',
            'deadline' => '2023-08-25',
            'url' => 'https://gsu-ssg.com/en/gsu/gsu-bursary-and-awards/gsu-bursary',
            'created_at' => '2023-07-21',
            'updated_at' => '2023-07-21'
         ]);
          
        Scholarship::create([
            'name' => 'George F. Jones Scholarship',
            'amount' => 'not identified',
            'criteria' => 'Applicants must be Involved & devoted to the game but does not have to be an active player; involved in helping expand the game of rugby in inner cities, first nation reserves, small towns, immigrant communities; currently involved in the sport. Criteria: contributions to the rugby community, how you have helped expand the game, other volunteer activities, academic achievements, most important accomplishments, future goals',
            'deadline' => '2023-09-01',
            'url' => 'https://canadianrugbyfoundation.ca/index.php/support-a-fund/scholarship/george-f-jones/',
            'created_at' => '2023-07-18',
            'updated_at' => '2023-07-18'
         ]);
        
         Scholarship::create([
            'name' => 'Thomas Family Scholarship',
            'amount' => 'not identified',
            'criteria' => 'Applicants must be currently playing rugby in Canada; 17 to 21 years of age; enrolled at a Canadian college or university for the coming academic year. Criteria: actively playing the sport & demonstrating they plan on staying active in the game; strong academic achievement; recognized contribution to local & rugby communities',
            'deadline' => '2023-09-01',
            'url' => 'https://canadianrugbyfoundation.ca/index.php/support-a-fund/scholarship/thomas-family/',
            'created_at' => '2023-07-21',
            'updated_at' => '2023-07-21'
         ]);

         Scholarship::create([
            'name' => 'James Lee Foundation Scholarship ',
            'amount' => '$5,000',
            'criteria' => 'Open to emerging creative talent from across Canada wanting to enter the advertising industry. Entrants must be non-professional Canadian residents over 16. All fields of creativity related to advertising considered (writers, art directors, film makers, recording artists, illustrators, digital artists, etc.). Scholarship awarded on the basis of the portfolio that demonstrates the most original thinking and craftsmanship according to the judging panel',
            'deadline' => '2023-09-15',
            'url' => 'https://jamesleefoundation.com/scholarship-rules-and-regulations/',
            'created_at' => '2023-07-21',
            'updated_at' => '2023-07-21'
         ]);

         Scholarship::create([
            'name' => 'AES Engineering Scholarship',
            'amount' => '$1,000',
            'criteria' => 'Available to high school seniors & students attending a post secondary educational facility. Not required to be taking Engineering courses to be eligible',
            'deadline' => '2023-10-08',
            'url' => 'https://aesengineers.com/scholarships.php',
            'created_at' => '2023-07-21',
            'updated_at' => '2023-07-21'
         ]);

         Scholarship::create([
            'name' => 'Pretty Photoshop Actions Scholarship Program',
            'amount' => '$500',
            'criteria' => 'Applicant must: be a senior in high school in the US or Canada; submit an essay-style Adobe Photoshop tutorial of 800 to 1,000 words, with screenshots and photos',
            'deadline' => '2023-10-15',
            'url' => 'https://www.lightroompresets.com/pages/pretty-photoshop-actions-scholarship-program',
            'created_at' => '2023-07-21',
            'updated_at' => '2023-07-21'
         ]);

         Scholarship::create([
            'name' => 'ServiceScape Scholarship',
            'amount' => '$1,000',
            'criteria' => 'Open to students at least 18 years of age who are attending or who will attend an accredited college, university, or trade school in 2022. Essay required',
            'deadline' => '2023-11-30',
            'url' => 'https://www.servicescape.com/scholarship',
            'created_at' => '2023-07-21',
            'updated_at' => '2023-07-21'
         ]);

        /* example: \App\Models\Scholarship::factory(10)->create();

         \App\Models\Scholarship::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);*/
    }
}
