<?php

namespace Database\Seeders;

use App\Models\Catalogpage;
use App\Models\Color;
use App\Models\Colormodelo;
use App\Models\Image;
use App\Models\Modelo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelos = [
            [
                'name' => '171',
                'slug' => Str::slug('171'),
                'description' => 'Mini bóxer con pretina y suave elástico en cintura que no marcan, ideal para sentirse cómoda en cualquier momento.<br>*Refuerzo de algodón interno',
                'code' => '171BX',
                'images' => [
                    ['url' => 'modelos/171/171-azul-4.jpg'],
                    ['url' => 'modelos/171/171-beige-3.jpg'],
                    ['url' => 'modelos/171/171-blanco-3.jpg'],
                    ['url' => 'modelos/171/171-negro-5.jpg'],
                    ['url' => 'modelos/171/171-rosa-3.jpg'],
                ],
                'catalogpages' => [
                    ['catalog_id' => 4, 'number_page' => 6]
                ],
                'colors' => [
                    [
                        'code' => '001', 
                        'images' => [
                            ['url' => 'modelos/171/171-blanco-1.jpg'],
                            ['url' => 'modelos/171/171-blanco-2.jpg'],
                            ['url' => 'modelos/171/171-blanco-3.jpg'],
                            ['url' => 'modelos/171/171-blanco-4.jpg'],
                            ['url' => 'modelos/171/171-blanco-5.jpg'],
                        ]
                    ],
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/171/171-negro-1.jpg'],
                            ['url' => 'modelos/171/171-negro-2.jpg'],
                            ['url' => 'modelos/171/171-negro-3.jpg'],
                            ['url' => 'modelos/171/171-negro-4.jpg'],
                            ['url' => 'modelos/171/171-negro-5.jpg'],
                        ]
                    ],
                    [
                        'code' => '018', 
                        'images' => [
                            ['url' => 'modelos/171/171-vino-1.jpg'],
                            ['url' => 'modelos/171/171-rosa-2.jpg'],
                            ['url' => 'modelos/171/171-rosa-3.jpg'],
                        ]
                    ],
                    [
                        'code' => '019', 
                        'images' => [
                            ['url' => 'modelos/171/171-rosa-1.jpg'],
                            ['url' => 'modelos/171/171-rosa-2.jpg'],
                            ['url' => 'modelos/171/171-rosa-3.jpg'],
                        ]
                    ],
                    [
                        'code' => '245', 
                        'images' => [
                            ['url' => 'modelos/171/171-azul-1.jpg'],
                            ['url' => 'modelos/171/171-azul-2.jpg'],
                            ['url' => 'modelos/171/171-azul-3.jpg'],
                            ['url' => 'modelos/171/171-azul-4.jpg'],
                            ['url' => 'modelos/171/171-azul-5.jpg'],
                        ]
                    ],
                    [
                        'code' => '248', 
                        'images' => [
                            ['url' => 'modelos/171/171-beige-1.jpg'],
                            ['url' => 'modelos/171/171-beige-2.jpg'],
                            ['url' => 'modelos/171/171-beige-3.jpg'],
                            ['url' => 'modelos/171/171-beige-4.jpg'],
                        ]
                    ],
                ],
                'price' => 17,
                'pricelist' => 17,
            ],
            [
                'name' => '1343',
                'slug' => Str::slug('1343'),
                'description' => 'Bustier de copa profunda, sisa ancha, espalda con doble tela y mayor cubrimiento, varillas laterales de mejor soporte, ideal para un busto grande con una modelación natural.<br>' . 
                '*Copa sin push-up<br>' .
                '*Laterales más anchos.<br>' .
                '*5 broches con 2 niveles de ajuste.<br>' .
                '*Refuerzo de algodón interno',
                'code' => '1343BRA',
                'images' => [
                    ['url' => 'modelos/1343/1343-azul-4.jpg'],
                    ['url' => 'modelos/1343/1343-beige-2.jpg'],
                    ['url' => 'modelos/1343/1343-blanco-5.jpg'],
                    ['url' => 'modelos/1343/1343-negro-4.jpg'],
                ],
                'catalogpages' => [
                    ['catalog_id' => 4, 'number_page' => 6]
                ],
                'colors' => [
                    [
                        'code' => '001', 
                        'images' => [
                            ['url' => 'modelos/1343/1343-blanco-1.jpg'],
                            ['url' => 'modelos/1343/1343-blanco-2.jpg'],
                            ['url' => 'modelos/1343/1343-blanco-3.jpg'],
                            ['url' => 'modelos/1343/1343-blanco-4.jpg'],
                            ['url' => 'modelos/1343/1343-blanco-5.jpg'],
                        ]
                    ],
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/1343/1343-negro-1.jpg'],
                            ['url' => 'modelos/1343/1343-negro-2.jpg'],
                            ['url' => 'modelos/1343/1343-negro-3.jpg'],
                            ['url' => 'modelos/1343/1343-negro-4.jpg'],
                            ['url' => 'modelos/1343/1343-negro-5.jpg'],
                            ['url' => 'modelos/1343/1343-negro-6.jpg'],
                        ]
                    ],
                    [
                        'code' => '245', 
                        'images' => [
                            ['url' => 'modelos/1343/1343-azul-1.jpg'],
                            ['url' => 'modelos/1343/1343-azul-2.jpg'],
                            ['url' => 'modelos/1343/1343-azul-3.jpg'],
                            ['url' => 'modelos/1343/1343-azul-4.jpg'],
                        ]
                    ],
                    [
                        'code' => '248', 
                        'images' => [
                            ['url' => 'modelos/1343/1343-beige-1.jpg'],
                            ['url' => 'modelos/1343/1343-beige-2.jpg'],
                            ['url' => 'modelos/1343/1343-beige-3.jpg'],
                            ['url' => 'modelos/1343/1343-beige-4.jpg'],
                            ['url' => 'modelos/1343/1343-beige-5.jpg'],
                            ['url' => 'modelos/1343/1343-beige-6.jpg'],
                        ]
                    ],
                ],
                'price' => 58,
                'pricelist' => 58,
            ],
        ];

        foreach ($modelos as $modelo) {
            $modelo_new = Modelo::create([
                'name' => $modelo['name'],
                'slug' => $modelo['slug'],
                'description' => $modelo['description'],
                'code' => $modelo['code'],
                'price' => $modelo['price'],
                'pricelist' => $modelo['pricelist'],
                'status' => Modelo::PUBLICADO,
            ]);

            foreach ($modelo['images'] as $image) {
                Image::create([
                    'url' => $image['url'],
                    'imageable_id' => $modelo_new->id,
                    'imageable_type' => Modelo::class
                ]);
            }

            foreach ($modelo['catalogpages'] as $catalogpage) {
                $catalogpage_find = Catalogpage::where('catalog_id', '=', $catalogpage['catalog_id'])
                                    ->where('number_page', '=', $catalogpage['number_page'])
                                    ->first();

                if ($catalogpage_find) {
                    $modelo_new->catalogpages()->attach($catalogpage_find->id);

                    $catalogpage_find->number_modelos = $catalogpage_find->number_modelos + 1;
                    $catalogpage_find->save();
                }
            }

            foreach ($modelo['colors'] as $color) {
                $color_find = Color::where('code', '=', $color['code'])->first();

                if ($color_find) {
                    $colormodelo_new = Colormodelo::create([
                                            'modelo_id' => $modelo_new->id,
                                            'color_id' => $color_find->id
                                        ]);
                    
                    foreach ($color['images'] as $image) {
                        Image::create([
                            'url' => $image['url'],
                            'imageable_id' => $colormodelo_new->id,
                            'imageable_type' => Colormodelo::class
                        ]);
                    }
                }
            }
        }
    }
}