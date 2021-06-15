<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catalogs = [
            [
                'title' => 'Primavera Verano 2019',
                'slug' => Str::slug('Primavera Verano 2019'),
                'subtitle' => '',
                'description' => '',
                'pdf' => ''
            ],
            [
                'title' => 'Otoño Invierno 2019',
                'slug' => Str::slug('Otoño Invierno 2019'),
                'subtitle' => '',
                'description' => '',
                'pdf' => ''
            ],
            [
                'title' => 'Otoño Invierno 2020',
                'slug' => Str::slug('Otoño Invierno 2020'),
                'subtitle' => '',
                'description' => '',
                'pdf' => ''
            ],
            [
                'title' => 'Otoño Invierno 2021',
                'slug' => Str::slug('Otoño Invierno 2021'),
                'subtitle' => '',
                'description' => '',
                'pdf' => ''
            ],
        ];

        foreach ($catalogs as $catalog) {
            Catalog::factory(1)->create($catalog)->first();
        }
    }
}
