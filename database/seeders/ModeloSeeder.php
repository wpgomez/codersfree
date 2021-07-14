<?php

namespace Database\Seeders;

use App\Models\Catalogpage;
use App\Models\Color;
use App\Models\Modelocolor;
use App\Models\Image;
use App\Models\Modelo;
use App\Models\Modelotalla;
use App\Models\Talla;
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
                'name2' => '171BX',
                'description' => 'Mini bóxer con pretina y suave elástico en cintura que no marcan, ideal para sentirse cómoda en cualquier momento.<br>*Refuerzo de algodón interno',
                'code' => '486',
                'images' => [
                    ['url' => 'modelos/171/171-azul-4.jpg'],
                    ['url' => 'modelos/171/171-beige-3.jpg'],
                    ['url' => 'modelos/171/171-blanco-3.jpg'],
                    ['url' => 'modelos/171/171-negro-5.jpg'],
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
                        ]
                    ],
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/171/171-negro-1.jpg'],
                            ['url' => 'modelos/171/171-negro-2.jpg'],
                            ['url' => 'modelos/171/171-negro-3.jpg'],
                            ['url' => 'modelos/171/171-negro-4.jpg'],
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
                'tallas' => [
                    ['code' => 'S'],
                    ['code' => 'M'],
                    ['code' => 'L'],
                    ['code' => 'XL'],
                ],
                'price' => 0,
                'pricelist' => 0,
            ],
            [
                'name' => '1343',
                'name2' => '1343BRA',
                'description' => 'Bustier de copa profunda, sisa ancha, espalda con doble tela y mayor cubrimiento, varillas laterales de mejor soporte, ideal para un busto grande con una modelación natural.<br>' . 
                '*Copa sin push-up<br>' .
                '*Laterales más anchos.<br>' .
                '*5 broches con 2 niveles de ajuste.<br>' .
                '*Refuerzo de algodón interno',
                'code' => '467',
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
                        ]
                    ],
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/1343/1343-negro-1.jpg'],
                            ['url' => 'modelos/1343/1343-negro-2.jpg'],
                            ['url' => 'modelos/1343/1343-negro-3.jpg'],
                            ['url' => 'modelos/1343/1343-negro-4.jpg'],
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
                        ]
                    ],
                ],
                'tallas' => [
                    ['code' => '32'],
                    ['code' => '34'],
                    ['code' => '36'],
                    ['code' => '38'],
                ],
                'price' => 0,
                'pricelist' => 0,
            ],
            [
                'name' => '1104',
                'name2' => '1104BRA',
                'description' => 'Brasier con copa de doble tela termofusionada y gran cubrimiento, ideal para busto grande que ayuda a una modelación natural, elaborado en licra pima sus copas lisas no se marcan en la ropa.
                <br>*Broche de 3×3 niveles',
                'code' => '461',
                'images' => [
                    ['url' => 'modelos/1104/1104-vino-2.jpg'],
                    ['url' => 'modelos/1104/1104-negro-2.jpg'],
                    ['url' => 'modelos/1104/1104-ivory-2.jpg'],
                    ['url' => 'modelos/1104/1104-beige-3.jpg'],
                ],
                'catalogpages' => [
                    ['catalog_id' => 4, 'number_page' => 7]
                ],
                'colors' => [
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/1104/1104-negro-1.jpg'],
                            ['url' => 'modelos/1104/1104-negro-2.jpg'],
                        ]
                    ],
                    [
                        'code' => '009', 
                        'images' => [
                            ['url' => 'modelos/1104/1104-ivory-1.jpg'],
                            ['url' => 'modelos/1104/1104-ivory-2.jpg'],
                        ]
                    ],
                    [
                        'code' => '018', 
                        'images' => [
                            ['url' => 'modelos/1104/1104-vino-1.jpg'],
                            ['url' => 'modelos/1104/1104-vino-2.jpg'],
                        ]
                    ],
                    [
                        'code' => '248', 
                        'images' => [
                            ['url' => 'modelos/1104/1104-beige-1.jpg'],
                            ['url' => 'modelos/1104/1104-beige-2.jpg'],
                            ['url' => 'modelos/1104/1104-beige-3.jpg'],
                        ]
                    ],
                ],
                'tallas' => [
                    ['code' => '32'],
                    ['code' => '34'],
                    ['code' => '36'],
                    ['code' => '38'],
                    ['code' => '40'],
                ],
                'price' => 0,
                'pricelist' => 0,
            ],
            [
                'name' => '1046',
                'name2' => '1046BRA',
                'description' => 'Brasier de copa prehormada con almohadilla incorporada para un realce medio, elaborado en licra pima sus copas lisas no se marcan, ideal para el día a día.',
                'code' => '084',
                'images' => [
                    ['url' => 'modelos/1046/1046-rojo-2.jpg'],
                    ['url' => 'modelos/1046/1046-negro-2.jpg'],
                    ['url' => 'modelos/1046/1046-blanco-2.jpg'],
                    ['url' => 'modelos/1046/1046-beige-2.jpg'],
                ],
                'catalogpages' => [
                    ['catalog_id' => 4, 'number_page' => 8]
                ],
                'colors' => [
                    [
                        'code' => '001', 
                        'images' => [
                            ['url' => 'modelos/1046/1046-blanco-1.jpg'],
                            ['url' => 'modelos/1046/1046-blanco-2.jpg'],
                        ]
                    ],
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/1046/1046-negro-1.jpg'],
                            ['url' => 'modelos/1046/1046-negro-2.jpg'],
                        ]
                    ],
                    [
                        'code' => '015', 
                        'images' => [
                            ['url' => 'modelos/1046/1046-rojo-1.jpg'],
                            ['url' => 'modelos/1046/1046-rojo-2.jpg'],
                        ]
                    ],
                    [
                        'code' => '248', 
                        'images' => [
                            ['url' => 'modelos/1046/1046-beige-1.jpg'],
                            ['url' => 'modelos/1046/1046-beige-2.jpg'],
                        ]
                    ],
                ],
                'tallas' => [
                    ['code' => '32'],
                    ['code' => '34'],
                    ['code' => '36'],
                    ['code' => '38'],
                ],
                'price' => 0,
                'pricelist' => 0,
            ],
            [
                'name' => '112',
                'name2' => '112BK',
                'description' => 'Bikini elaborado en licra pima,con suaves elásticos que no marcan en la cintura y piernas. Refuerzo interno de algodón.',
                'code' => '001',
                'images' => [
                    ['url' => 'modelos/112/112-fresa-2.jpg'],
                    ['url' => 'modelos/112/112-negro-2.jpg'],
                    ['url' => 'modelos/112/112-blanco-2.jpg'],
                    ['url' => 'modelos/112/112-beige-2.jpg'],
                ],
                'catalogpages' => [
                    ['catalog_id' => 4, 'number_page' => 8]
                ],
                'colors' => [
                    [
                        'code' => '001', 
                        'images' => [
                            ['url' => 'modelos/112/112-blanco-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/112/112-negro-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '009', 
                        'images' => [
                            ['url' => 'modelos/112/112-ivory-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '015', 
                        'images' => [
                            ['url' => 'modelos/112/112-rojo-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '018', 
                        'images' => [
                            ['url' => 'modelos/112/112-vino-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '063', 
                        'images' => [
                            ['url' => 'modelos/112/112-lavanda-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '064', 
                        'images' => [
                            ['url' => 'modelos/112/112-fresa-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '065', 
                        'images' => [
                            ['url' => 'modelos/112/112-aguamarina-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '190', 
                        'images' => [
                            ['url' => 'modelos/112/112-melange-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '245', 
                        'images' => [
                            ['url' => 'modelos/112/112-azulmedieval-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '248', 
                        'images' => [
                            ['url' => 'modelos/112/112-beige-1.jpg'],
                            ['url' => 'modelos/112/112-beige-2.jpg'],
                        ]
                    ],
                ],
                'tallas' => [
                    ['code' => 'S'],
                    ['code' => 'M'],
                    ['code' => 'L'],
                ],
                'price' => 0,
                'pricelist' => 0,
            ],
            [
                'name' => '1047',
                'name2' => '1047BRA',
                'description' => 'Brasier strapless con aro para mejor realce, elaborado de licra pima, sujetadores removibles.',
                'code' => '188',
                'images' => [
                    ['url' => 'modelos/1047/1047-negro-2.jpg'],
                    ['url' => 'modelos/1047/1047-blanco-2.jpg'],
                    ['url' => 'modelos/1047/1047-azulmedieval-1.jpg'],
                    ['url' => 'modelos/1047/1047-beige-1.jpg'],
                ],
                'catalogpages' => [
                    ['catalog_id' => 4, 'number_page' => 9]
                ],
                'colors' => [
                    [
                        'code' => '001', 
                        'images' => [
                            ['url' => 'modelos/1047/1047-blanco-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/1047/1047-negro-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '245', 
                        'images' => [
                            ['url' => 'modelos/1047/1047-azulmedieval-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '248', 
                        'images' => [
                            ['url' => 'modelos/1047/1047-beige-1.jpg'],
                        ]
                    ],
                ],
                'tallas' => [
                    ['code' => '32'],
                    ['code' => '34'],
                    ['code' => '36'],
                    ['code' => '38'],
                ],
                'price' => 0,
                'pricelist' => 0,
            ],
            [
                'name' => '120',
                'name2' => '120BK',
                'description' => 'Bikini en licra pima , con elástico afelpado en la cintura y elástico suave en las piernas, que no se marca, refuerzo interno de algodón.',
                'code' => '002',
                'images' => [
                    ['url' => 'modelos/120/120-fresa-2.jpg'],
                    ['url' => 'modelos/120/120-negro-2.jpg'],
                    ['url' => 'modelos/120/120-blanco-2.jpg'],
                    ['url' => 'modelos/120/120-beige-2.jpg'],
                ],
                'catalogpages' => [
                    ['catalog_id' => 4, 'number_page' => 9]
                ],
                'colors' => [
                    [
                        'code' => '001', 
                        'images' => [
                            ['url' => 'modelos/120/120-blanco-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '002', 
                        'images' => [
                            ['url' => 'modelos/120/120-negro-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '015', 
                        'images' => [
                            ['url' => 'modelos/120/120-rojo-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '018', 
                        'images' => [
                            ['url' => 'modelos/120/120-vino-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '063', 
                        'images' => [
                            ['url' => 'modelos/120/120-lavanda-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '064', 
                        'images' => [
                            ['url' => 'modelos/120/120-fresa-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '065', 
                        'images' => [
                            ['url' => 'modelos/120/120-aguamarina-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '208', 
                        'images' => [
                            ['url' => 'modelos/120/120-sandia-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '222', 
                        'images' => [
                            ['url' => 'modelos/120/120-azulroyal-1.jpg'],
                        ]
                    ],
                    [
                        'code' => '248', 
                        'images' => [
                            ['url' => 'modelos/120/120-beige-1.jpg'],
                        ]
                    ],
                ],
                'tallas' => [
                    ['code' => 'S'],
                    ['code' => 'M'],
                    ['code' => 'L'],
                ],
                'price' => 0,
                'pricelist' => 0,
            ],
        ];

        foreach ($modelos as $modelo) {
            $modelo_new = Modelo::create([
                'name' => $modelo['name'],
                'name2' => $modelo['name2'],
                'slug' => Str::slug($modelo['name']),
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
                    $modelocolor_new = Modelocolor::create([
                                            'modelo_id' => $modelo_new->id,
                                            'color_id' => $color_find->id
                                        ]);
                    
                    foreach ($color['images'] as $image) {
                        Image::create([
                            'url' => $image['url'],
                            'imageable_id' => $modelocolor_new->id,
                            'imageable_type' => Modelocolor::class
                        ]);
                    }
                }
            }

            foreach ($modelo['tallas'] as $talla) {
                $talla_find = Talla::where('code', '=', $talla['code'])->first();

                if ($talla_find) {
                    Modelotalla::create([
                                'modelo_id' => $modelo_new->id,
                                'talla_id' => $talla_find->id
                            ]);
                }
            }
        }
    }
}