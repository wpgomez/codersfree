<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\Catalogpage;
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
                'pdf' => 'catalogs/1.pdf',
                'image' => 'catalogs/1.jpg',
                'number_pages' => 88
            ],
            [
                'title' => 'Otoño Invierno 2019',
                'slug' => Str::slug('Otoño Invierno 2019'),
                'subtitle' => '',
                'description' => '',
                'pdf' => 'catalogs/2.pdf',
                'image' => 'catalogs/2.jpg',
                'number_pages' => 136
            ],
            [
                'title' => 'Otoño Invierno 2020',
                'slug' => Str::slug('Otoño Invierno 2020'),
                'subtitle' => '',
                'description' => '',
                'pdf' => 'catalogs/3.pdf',
                'image' => 'catalogs/3.jpg',
                'number_pages' => 82
            ],
            [
                'title' => 'Otoño Invierno 2021',
                'slug' => Str::slug('Otoño Invierno 2021'),
                'subtitle' => '',
                'description' => '',
                'pdf' => 'catalogs/4.pdf',
                'image' => 'catalogs/4.jpg',
                'number_pages' => 104
            ],
        ];

        foreach ($catalogs as $catalog) {
            $catalog_new = Catalog::create([
                'title' => $catalog['title'],
                'slug' => $catalog['slug'],
                'subtitle' => $catalog['subtitle'],
                'description' => $catalog['description'],
                'pdf' => $catalog['pdf'],
                'image' => $catalog['image'],
                'number_pages' => $catalog['number_pages'],
                'status' => Catalog::PUBLICADO
            ]);

            $pages = $catalog['number_pages'];

            for ($i=0; $i < $pages; $i++) { 
                $id = $catalog_new->id;
                $page = $i+1;
                Catalogpage::create([
                    'catalog_id' => $id,
                    'number_page' => $page,
                    'image_normal' => "catalogpages/{$id}/normal/{$page}.jpg",
                    'image_small' => "catalogpages/{$id}/small/{$page}.jpg",
                    'number_modelos' => 0
                ]);
            }
        }
    }
}
