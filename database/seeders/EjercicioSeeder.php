<?php

namespace Database\Seeders;

use App\Models\Ejercicio;
use Illuminate\Database\Seeder;

class EjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ejercicios = [
            2019, 2020, 2021, 2022, 2023, 
            2024, 2025, 2026, 2027, 2028
        ];

        foreach ($ejercicios as $ejercicio) {
            Ejercicio::create([
                'name' => (string) $ejercicio,
                'code' => $ejercicio
            ]);
        }
    }
}
