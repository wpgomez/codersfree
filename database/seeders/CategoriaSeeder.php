<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Modelo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'name' => 'Natural', 
                'image' => 'categorias/01-natural.jpg',
                'modelos' => [
                    '1343', '171', '1104', '1046', '112', '1047', '120'
                ]
            ],
            [
                'name' => 'Fascinante', 
                'image' => 'categorias/02-fascinante.jpg',
                'modelos' => [
                    '1107', '020', '1342', '1330', '320', '1338', '1045', '155', '145', '1040', '124'
                ]
            ],
            [
                'name' => 'Clasica', 
                'image' => 'categorias/03-clasica.jpg',
                'modelos' => [
                    '20118', '20115', '102', '1414', '20124', '101', '1103', '033', '1332', '1340', '040', '1341', '1413', '1410', '118', '5001'
                ]
            ],
            [
                'name' => 'Provocadora', 
                'image' => 'categorias/04-provocadora.jpg',
                'modelos' => [
                    '2008', '2014', '2004', '2003', '2005', '2006', '28113', '2001', '2100', '28111', '2011'
                ]
            ],
            [
                'name' => 'Juvenil',
                'image' => 'categorias/05-juvenil.jpg',
                'modelos' => [
                    '1033', '301', '8000', '800', '8002', '802', '8001', '801', '1029', '176', '1165', '166', '1163', '165', '164', '163'
                ]
            ],
            [
                'name' => 'Teens',
                'image' => 'categorias/06-teens.jpg',
                'modelos' => [
                    '3005', '305', '3006', '306', '1001', '1056', '1004', '1055', '1051', '1015', '1014', '3002', '302', '1002', '002', '1050', '1054', '4055', '4054', '084', '078'
                ]
            ],
            [
                'name' => 'Fajas',
                'image' => 'categorias/07-fajas.jpg',
                'modelos' => [
                    '527', '526', '7000', '550', '570', '525', '524', '522'
                ]
            ],
            [
                'name' => 'Trusa',
                'image' => 'categorias/08-trusa.jpg',
                'modelos' => [
                    '161', '117', '377', '256', '113', '100', '046'
                ]
            ],
            [
                'name' => 'Boxer',
                'image' => 'categorias/09-boxer.jpg',
                'modelos' => [
                    '170', '156', '126', '150', '334', '154'
                ]
            ],
            [
                'name' => 'Bikini',
                'image' => 'categorias/10-bikini.jpg',
                'modelos' => [
                    '116', '019', '137', '130', '048', '015', '606', '144', '132', '240', '153'
                ]
            ],
            [
                'name' => 'Hilo',
                'image' => 'categorias/11-hilo.jpg',
                'modelos' => [
                    '813', '246', '811', '121', '133', '135', '210', '147', '172'
                ]
            ],
        ];

        foreach ($categorias as $categoria) {
            $categoria_new = Categoria::create([
                'name' => $categoria['name'],
                'slug' => Str::slug($categoria['name']),
                'icon' => '',
                'image' => $categoria['image'],
                'status' => Categoria::PUBLICADO
            ]);

            foreach ($categoria['modelos'] as $modelo) {
                $modelo_find = Modelo::where('name', '=', $modelo)
                                    ->first();

                if ($modelo_find) {
                    $categoria_new->modelos()->attach($modelo_find->id);
                }
            }
        }
    }
}
