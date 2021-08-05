<?php

namespace Database\Seeders;

use App\Models\Mes;
use Illuminate\Database\Seeder;

class MesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meses = [
            ['name' => 'Todos', 'code' => 0],
            ['name' => 'Enero', 'code' => 1],
            ['name' => 'Febrero', 'code' => 2],
            ['name' => 'Marzo', 'code' => 3],
            ['name' => 'Abril', 'code' => 4],
            ['name' => 'Mayo', 'code' => 5],
            ['name' => 'Junio', 'code' => 6],
            ['name' => 'Julio', 'code' => 7],
            ['name' => 'Agosto', 'code' => 8],
            ['name' => 'Septiembre', 'code' => 9],
            ['name' => 'Octubre', 'code' => 10],
            ['name' => 'Noviembre', 'code' => 11],
            ['name' => 'Diciembre', 'code' => 12],
        ];

        foreach ($meses as $mes) {
            Mes::create([
                'name' => $mes['name'],
                'code' => $mes['code']
            ]);
        }
    }
}
