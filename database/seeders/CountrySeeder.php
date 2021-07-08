<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'Peru', 'code' => '001']
        ];

        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
                'code' => $country['code']
            ]);
        }
    }
}
