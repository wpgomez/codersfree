<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'AMAZONAS', 'code_pais' => '001', 'code_departamento' => '001'],
            ['name' => 'ANCASH', 'code_pais' => '001', 'code_departamento' => '002'],
            ['name' => 'APURIMAC', 'code_pais' => '001', 'code_departamento' => '003'],
            ['name' => 'AREQUIPA', 'code_pais' => '001', 'code_departamento' => '004'],
            ['name' => 'AYACUCHO', 'code_pais' => '001', 'code_departamento' => '005'],
            ['name' => 'CAJAMARCA', 'code_pais' => '001', 'code_departamento' => '006'],
            ['name' => 'CALLAO', 'code_pais' => '001', 'code_departamento' => '007'],
            ['name' => 'CUSCO', 'code_pais' => '001', 'code_departamento' => '008'],
            ['name' => 'HUANCAVELICA', 'code_pais' => '001', 'code_departamento' => '009'],
            ['name' => 'HUANUCO', 'code_pais' => '001', 'code_departamento' => '010'],
            ['name' => 'ICA', 'code_pais' => '001', 'code_departamento' => '011'],
            ['name' => 'JUNIN', 'code_pais' => '001', 'code_departamento' => '012'],
            ['name' => 'LA LIBERTAD', 'code_pais' => '001', 'code_departamento' => '013'],
            ['name' => 'LAMBAYEQUE', 'code_pais' => '001', 'code_departamento' => '014'],
            ['name' => 'LIMA', 'code_pais' => '001', 'code_departamento' => '015'],
            ['name' => 'LORETO', 'code_pais' => '001', 'code_departamento' => '016'],
            ['name' => 'MADRE DE DIOS', 'code_pais' => '001', 'code_departamento' => '017'],
            ['name' => 'MOQUEGUA', 'code_pais' => '001', 'code_departamento' => '018'],
            ['name' => 'PASCO', 'code_pais' => '001', 'code_departamento' => '019'],
            ['name' => 'PIURA', 'code_pais' => '001', 'code_departamento' => '020'],
            ['name' => 'PUNO', 'code_pais' => '001', 'code_departamento' => '021'],
            ['name' => 'SAN MARTIN', 'code_pais' => '001', 'code_departamento' => '022'],
            ['name' => 'TACNA', 'code_pais' => '001', 'code_departamento' => '023'],
            ['name' => 'TUMBES', 'code_pais' => '001', 'code_departamento' => '024'],
            ['name' => 'UCAYALI', 'code_pais' => '001', 'code_departamento' => '025'],
        ];

        foreach ($departments as $department) {
            $country = Country::where('code', '=', $department['code_pais'])
                        ->first();
            if ($country) {
                Department::create([
                    'name' => $department['name'],
                    'country_id' => $country->id,
                    'code_pais' => $department['code_pais'],
                    'code_departamento' => $department['code_departamento']
                ]);
            }
        }
    }
}
