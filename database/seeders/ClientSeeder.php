<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name_complete' => 'GOMEZ CUEVA WILLIAM PEDRO',
            'first_name' => 'WILLIAM',
            'last_name' => 'PEDRO',
            'apellido_paterno' => 'GOMEZ',
            'apellido_materno' => 'CUEVA',
            'nro_doc_identidad' => '10531466',
            'phone' => '',
            'phone2' => '',
            'country_id' => 1,
            'department_id' => 15,
            'province_id' => 128,
            'district_id' => 1265,
            'address' => 'URB. 5 DE AGOSTO MZ. E LOTE 5',
            'code' => '10531466',
            'user_id' => 1
        ]);
    }
}
