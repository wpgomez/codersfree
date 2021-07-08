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
            ['name' => 'Mañana'],
            ['name' => 'Medio Día'],
            ['name' => 'Tarde'],
        ];

        foreach ($momentcontacts as $momentcontact) {
            Momentcontact::create([
                'name' => $momentcontact['name']
            ]);
        }
    }
}
