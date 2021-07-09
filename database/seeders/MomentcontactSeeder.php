<?php

namespace Database\Seeders;

use App\Models\Momentcontact;
use Illuminate\Database\Seeder;

class MomentcontactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $momentcontacts = [
            ['name' => 'En la Mañana'],
            ['name' => 'Al Medio Día'],
            ['name' => 'En la Tarde'],
        ];

        foreach ($momentcontacts as $momentcontact) {
            Momentcontact::create([
                'name' => $momentcontact['name']
            ]);
        }
    }
}
