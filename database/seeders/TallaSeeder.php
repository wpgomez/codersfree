<?php

namespace Database\Seeders;

use App\Models\Talla;
use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tallas = [
            ['name' => '06', 'grupo' => 1, 'orden' => 1, 'code' => '06'],
            ['name' => '08', 'grupo' => 1, 'orden' => 2, 'code' => '08'],
            ['name' => '10', 'grupo' => 1, 'orden' => 3, 'code' => '10'],
            ['name' => '12', 'grupo' => 1, 'orden' => 4, 'code' => '12'],
            ['name' => '14', 'grupo' => 1, 'orden' => 5, 'code' => '14'],
            ['name' => '16', 'grupo' => 1, 'orden' => 6, 'code' => '16'],
            ['name' => '18', 'grupo' => 1, 'orden' => 7, 'code' => '18'],
            ['name' => '20', 'grupo' => 1, 'orden' => 8, 'code' => '20'],
            ['name' => '22', 'grupo' => 1, 'orden' => 9, 'code' => '22'],
            ['name' => '24', 'grupo' => 1, 'orden' => 10, 'code' => '24'],
            ['name' => '26', 'grupo' => 2, 'orden' => 1, 'code' => '26'],
            ['name' => '28', 'grupo' => 2, 'orden' => 2, 'code' => '28'],
            ['name' => '30', 'grupo' => 2, 'orden' => 3, 'code' => '30'],
            ['name' => '32', 'grupo' => 2, 'orden' => 4, 'code' => '32'],
            ['name' => '34', 'grupo' => 2, 'orden' => 5, 'code' => '34'],
            ['name' => '36', 'grupo' => 2, 'orden' => 6, 'code' => '36'],
            ['name' => '38', 'grupo' => 2, 'orden' => 7, 'code' => '38'],
            ['name' => '40', 'grupo' => 2, 'orden' => 8, 'code' => '40'],
            ['name' => '42', 'grupo' => 2, 'orden' => 9, 'code' => '42'],
            ['name' => '44', 'grupo' => 2, 'orden' => 10, 'code' => '44'],
            ['name' => 'U', 'grupo' => 3, 'orden' => 1, 'code' => 'U'],
            ['name' => 'S', 'grupo' => 3, 'orden' => 2, 'code' => 'S'],
            ['name' => 'XS', 'grupo' => 3, 'orden' => 3, 'code' => 'XS'],
            ['name' => 'M', 'grupo' => 3, 'orden' => 4, 'code' => 'M'],
            ['name' => 'L', 'grupo' => 3, 'orden' => 5, 'code' => 'L'],
            ['name' => 'XL', 'grupo' => 3, 'orden' => 6, 'code' => 'XL'],
            ['name' => 'XXL', 'grupo' => 3, 'orden' => 7, 'code' => 'XXL'],
        ];

        foreach ($tallas as $talla) {
            Talla::create([
                'name' => $talla['name'],
                'grupo' => $talla['grupo'],
                'orden' => $talla['orden'],
                'code' => $talla['code']
            ]);
        }
    }
}
