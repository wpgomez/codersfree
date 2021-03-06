<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['name' => 'CHACHAPOYAS', 'code_pais' => '001', 'code_departamento' => '001', 'code_provincia' => '001'],
            ['name' => 'BAGUA', 'code_pais' => '001', 'code_departamento' => '001', 'code_provincia' => '002'],
            ['name' => 'BONGARA', 'code_pais' => '001', 'code_departamento' => '001', 'code_provincia' => '003'],
            ['name' => 'CONDORCANQUI', 'code_pais' => '001', 'code_departamento' => '001', 'code_provincia' => '004'],
            ['name' => 'LUYA', 'code_pais' => '001', 'code_departamento' => '001', 'code_provincia' => '005'],
            ['name' => 'RODRIGUEZ DE MENDOZA', 'code_pais' => '001', 'code_departamento' => '001', 'code_provincia' => '006'],
            ['name' => 'UTCUBAMBA', 'code_pais' => '001', 'code_departamento' => '001', 'code_provincia' => '007'],
            ['name' => 'HUARAZ', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '001'],
            ['name' => 'AIJA', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '002'],
            ['name' => 'ANTONIO RAYMONDI', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '003'],
            ['name' => 'ASUNCION', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '004'],
            ['name' => 'BOLOGNESI', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '005'],
            ['name' => 'CARHUAZ', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '006'],
            ['name' => 'CARLOS FERMIN FITZCARRALD', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '007'],
            ['name' => 'CASMA', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '008'],
            ['name' => 'CORONGO', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '009'],
            ['name' => 'HUARI', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '010'],
            ['name' => 'HUARMEY', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '011'],
            ['name' => 'HUAYLAS', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '012'],
            ['name' => 'MARISCAL LUZURIAGA', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '013'],
            ['name' => 'OCROS', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '014'],
            ['name' => 'PALLASCA', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '015'],
            ['name' => 'POMABAMBA', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '016'],
            ['name' => 'RECUAY', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '017'],
            ['name' => 'SANTA', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '018'],
            ['name' => 'SIHUAS', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '019'],
            ['name' => 'YUNGAY', 'code_pais' => '001', 'code_departamento' => '002', 'code_provincia' => '020'],
            ['name' => 'ABANCAY', 'code_pais' => '001', 'code_departamento' => '003', 'code_provincia' => '001'],
            ['name' => 'ANDAHUAYLAS', 'code_pais' => '001', 'code_departamento' => '003', 'code_provincia' => '002'],
            ['name' => 'ANTABAMBA', 'code_pais' => '001', 'code_departamento' => '003', 'code_provincia' => '003'],
            ['name' => 'AYMARAES', 'code_pais' => '001', 'code_departamento' => '003', 'code_provincia' => '004'],
            ['name' => 'COTABAMBAS', 'code_pais' => '001', 'code_departamento' => '003', 'code_provincia' => '005'],
            ['name' => 'CHINCHEROS', 'code_pais' => '001', 'code_departamento' => '003', 'code_provincia' => '006'],
            ['name' => 'GRAU', 'code_pais' => '001', 'code_departamento' => '003', 'code_provincia' => '007'],
            ['name' => 'AREQUIPA', 'code_pais' => '001', 'code_departamento' => '004', 'code_provincia' => '001'],
            ['name' => 'CAMANA', 'code_pais' => '001', 'code_departamento' => '004', 'code_provincia' => '002'],
            ['name' => 'CARAVELI', 'code_pais' => '001', 'code_departamento' => '004', 'code_provincia' => '003'],
            ['name' => 'CASTILLA', 'code_pais' => '001', 'code_departamento' => '004', 'code_provincia' => '004'],
            ['name' => 'CAYLLOMA', 'code_pais' => '001', 'code_departamento' => '004', 'code_provincia' => '005'],
            ['name' => 'CONDESUYOS', 'code_pais' => '001', 'code_departamento' => '004', 'code_provincia' => '006'],
            ['name' => 'ISLAY', 'code_pais' => '001', 'code_departamento' => '004', 'code_provincia' => '007'],
            ['name' => 'LA UNION', 'code_pais' => '001', 'code_departamento' => '004', 'code_provincia' => '008'],
            ['name' => 'HUAMANGA', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '001'],
            ['name' => 'CANGALLO', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '002'],
            ['name' => 'HUANCA SANCOS', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '003'],
            ['name' => 'HUANTA', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '004'],
            ['name' => 'LA MAR', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '005'],
            ['name' => 'LUCANAS', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '006'],
            ['name' => 'PARINACOCHAS', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '007'],
            ['name' => 'PAUCAR DEL SARA SARA', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '008'],
            ['name' => 'SUCRE', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '009'],
            ['name' => 'VICTOR FAJARDO', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '010'],
            ['name' => 'VILCAS HUAMAN', 'code_pais' => '001', 'code_departamento' => '005', 'code_provincia' => '011'],
            ['name' => 'CAJAMARCA', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '001'],
            ['name' => 'CAJABAMBA', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '002'],
            ['name' => 'CELENDIN', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '003'],
            ['name' => 'CHOTA', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '004'],
            ['name' => 'CONTUMAZA', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '005'],
            ['name' => 'CUTERVO', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '006'],
            ['name' => 'HUALGAYOC', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '007'],
            ['name' => 'JAEN', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '008'],
            ['name' => 'SAN IGNACIO', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '009'],
            ['name' => 'SAN MARCOS', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '010'],
            ['name' => 'SAN MIGUEL', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '011'],
            ['name' => 'SAN PABLO', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '012'],
            ['name' => 'SANTA CRUZ', 'code_pais' => '001', 'code_departamento' => '006', 'code_provincia' => '013'],
            ['name' => 'CALLAO', 'code_pais' => '001', 'code_departamento' => '007', 'code_provincia' => '001'],
            ['name' => 'CUSCO', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '001'],
            ['name' => 'ACOMAYO', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '002'],
            ['name' => 'ANTA', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '003'],
            ['name' => 'CALCA', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '004'],
            ['name' => 'CANAS', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '005'],
            ['name' => 'CANCHIS', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '006'],
            ['name' => 'CHUMBIVILCAS', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '007'],
            ['name' => 'ESPINAR', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '008'],
            ['name' => 'LA CONVENCION', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '009'],
            ['name' => 'PARURO', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '010'],
            ['name' => 'PAUCARTAMBO', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '011'],
            ['name' => 'QUISPICANCHI', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '012'],
            ['name' => 'URUBAMBA', 'code_pais' => '001', 'code_departamento' => '008', 'code_provincia' => '013'],
            ['name' => 'HUANCAVELICA', 'code_pais' => '001', 'code_departamento' => '009', 'code_provincia' => '001'],
            ['name' => 'ACOBAMBA', 'code_pais' => '001', 'code_departamento' => '009', 'code_provincia' => '002'],
            ['name' => 'ANGARAES', 'code_pais' => '001', 'code_departamento' => '009', 'code_provincia' => '003'],
            ['name' => 'CASTROVIRREYNA', 'code_pais' => '001', 'code_departamento' => '009', 'code_provincia' => '004'],
            ['name' => 'CHURCAMPA', 'code_pais' => '001', 'code_departamento' => '009', 'code_provincia' => '005'],
            ['name' => 'HUAYTARA', 'code_pais' => '001', 'code_departamento' => '009', 'code_provincia' => '006'],
            ['name' => 'TAYACAJA', 'code_pais' => '001', 'code_departamento' => '009', 'code_provincia' => '007'],
            ['name' => 'HUANUCO', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '001'],
            ['name' => 'AMBO', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '002'],
            ['name' => 'DOS DE MAYO', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '003'],
            ['name' => 'HUACAYBAMBA', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '004'],
            ['name' => 'HUAMALIES', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '005'],
            ['name' => 'LEONCIO PRADO', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '006'],
            ['name' => 'MARA??ON', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '007'],
            ['name' => 'PACHITEA', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '008'],
            ['name' => 'PUERTO INCA', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '009'],
            ['name' => 'LAURICOCHA', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '010'],
            ['name' => 'YAROWILCA', 'code_pais' => '001', 'code_departamento' => '010', 'code_provincia' => '011'],
            ['name' => 'ICA', 'code_pais' => '001', 'code_departamento' => '011', 'code_provincia' => '001'],
            ['name' => 'CHINCHA', 'code_pais' => '001', 'code_departamento' => '011', 'code_provincia' => '002'],
            ['name' => 'NAZCA', 'code_pais' => '001', 'code_departamento' => '011', 'code_provincia' => '003'],
            ['name' => 'PALPA', 'code_pais' => '001', 'code_departamento' => '011', 'code_provincia' => '004'],
            ['name' => 'PISCO', 'code_pais' => '001', 'code_departamento' => '011', 'code_provincia' => '005'],
            ['name' => 'HUANCAYO', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '001'],
            ['name' => 'CONCEPCION', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '002'],
            ['name' => 'CHANCHAMAYO', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '003'],
            ['name' => 'JAUJA', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '004'],
            ['name' => 'JUNIN', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '005'],
            ['name' => 'SATIPO', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '006'],
            ['name' => 'TARMA', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '007'],
            ['name' => 'YAULI', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '008'],
            ['name' => 'CHUPACA', 'code_pais' => '001', 'code_departamento' => '012', 'code_provincia' => '009'],
            ['name' => 'TRUJILLO', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '001'],
            ['name' => 'ASCOPE', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '002'],
            ['name' => 'BOLIVAR', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '003'],
            ['name' => 'CHEPEN', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '004'],
            ['name' => 'JULCAN', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '005'],
            ['name' => 'OTUZCO', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '006'],
            ['name' => 'PACASMAYO', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '007'],
            ['name' => 'PATAZ', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '008'],
            ['name' => 'SANCHEZ CARRION', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '009'],
            ['name' => 'SANTIAGO DE CHUCO', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '010'],
            ['name' => 'GRAN CHIMU', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '011'],
            ['name' => 'VIRU', 'code_pais' => '001', 'code_departamento' => '013', 'code_provincia' => '012'],
            ['name' => 'CHICLAYO', 'code_pais' => '001', 'code_departamento' => '014', 'code_provincia' => '001'],
            ['name' => 'FERRE??AFE', 'code_pais' => '001', 'code_departamento' => '014', 'code_provincia' => '002'],
            ['name' => 'LAMBAYEQUE', 'code_pais' => '001', 'code_departamento' => '014', 'code_provincia' => '003'],
            ['name' => 'LIMA', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '001'],
            ['name' => 'BARRANCA', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '002'],
            ['name' => 'CAJATAMBO', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '003'],
            ['name' => 'CANTA', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '004'],
            ['name' => 'CA??ETE', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '005'],
            ['name' => 'HUARAL', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '006'],
            ['name' => 'HUAROCHIRI', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '007'],
            ['name' => 'HUAURA', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '008'],
            ['name' => 'OYON', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '009'],
            ['name' => 'YAUYOS', 'code_pais' => '001', 'code_departamento' => '015', 'code_provincia' => '010'],
            ['name' => 'MAYNAS', 'code_pais' => '001', 'code_departamento' => '016', 'code_provincia' => '001'],
            ['name' => 'ALTO AMAZONAS', 'code_pais' => '001', 'code_departamento' => '016', 'code_provincia' => '002'],
            ['name' => 'LORETO', 'code_pais' => '001', 'code_departamento' => '016', 'code_provincia' => '003'],
            ['name' => 'MARISCAL RAMON CASTILLA', 'code_pais' => '001', 'code_departamento' => '016', 'code_provincia' => '004'],
            ['name' => 'REQUENA', 'code_pais' => '001', 'code_departamento' => '016', 'code_provincia' => '005'],
            ['name' => 'UCAYALI', 'code_pais' => '001', 'code_departamento' => '016', 'code_provincia' => '006'],
            ['name' => 'DATEM DEL MARA??ON', 'code_pais' => '001', 'code_departamento' => '016', 'code_provincia' => '007'],
            ['name' => 'TAMBOPATA', 'code_pais' => '001', 'code_departamento' => '017', 'code_provincia' => '001'],
            ['name' => 'MANU', 'code_pais' => '001', 'code_departamento' => '017', 'code_provincia' => '002'],
            ['name' => 'TAHUAMANU', 'code_pais' => '001', 'code_departamento' => '017', 'code_provincia' => '003'],
            ['name' => 'MARISCAL NIETO', 'code_pais' => '001', 'code_departamento' => '018', 'code_provincia' => '001'],
            ['name' => 'GENERAL SANCHEZ CERRO', 'code_pais' => '001', 'code_departamento' => '018', 'code_provincia' => '002'],
            ['name' => 'ILO', 'code_pais' => '001', 'code_departamento' => '018', 'code_provincia' => '003'],
            ['name' => 'PASCO', 'code_pais' => '001', 'code_departamento' => '019', 'code_provincia' => '001'],
            ['name' => 'DANIEL ALCIDES CARRION', 'code_pais' => '001', 'code_departamento' => '019', 'code_provincia' => '002'],
            ['name' => 'OXAPAMPA', 'code_pais' => '001', 'code_departamento' => '019', 'code_provincia' => '003'],
            ['name' => 'PIURA', 'code_pais' => '001', 'code_departamento' => '020', 'code_provincia' => '001'],
            ['name' => 'AYABACA', 'code_pais' => '001', 'code_departamento' => '020', 'code_provincia' => '002'],
            ['name' => 'HUANCABAMBA', 'code_pais' => '001', 'code_departamento' => '020', 'code_provincia' => '003'],
            ['name' => 'MORROPON', 'code_pais' => '001', 'code_departamento' => '020', 'code_provincia' => '004'],
            ['name' => 'PAITA', 'code_pais' => '001', 'code_departamento' => '020', 'code_provincia' => '005'],
            ['name' => 'SULLANA', 'code_pais' => '001', 'code_departamento' => '020', 'code_provincia' => '006'],
            ['name' => 'TALARA', 'code_pais' => '001', 'code_departamento' => '020', 'code_provincia' => '007'],
            ['name' => 'SECHURA', 'code_pais' => '001', 'code_departamento' => '020', 'code_provincia' => '008'],
            ['name' => 'PUNO', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '001'],
            ['name' => 'AZANGARO', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '002'],
            ['name' => 'CARABAYA', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '003'],
            ['name' => 'CHUCUITO', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '004'],
            ['name' => 'EL COLLAO', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '005'],
            ['name' => 'HUANCANE', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '006'],
            ['name' => 'LAMPA', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '007'],
            ['name' => 'MELGAR', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '008'],
            ['name' => 'MOHO', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '009'],
            ['name' => 'SAN ANTONIO DE PUTINA', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '010'],
            ['name' => 'SAN ROMAN', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '011'],
            ['name' => 'SANDIA', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '012'],
            ['name' => 'YUNGUYO', 'code_pais' => '001', 'code_departamento' => '021', 'code_provincia' => '013'],
            ['name' => 'MOYOBAMBA', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '001'],
            ['name' => 'BELLAVISTA', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '002'],
            ['name' => 'EL DORADO', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '003'],
            ['name' => 'HUALLAGA', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '004'],
            ['name' => 'LAMAS', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '005'],
            ['name' => 'MARISCAL CACERES', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '006'],
            ['name' => 'PICOTA', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '007'],
            ['name' => 'RIOJA', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '008'],
            ['name' => 'SAN MARTIN', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '009'],
            ['name' => 'TOCACHE', 'code_pais' => '001', 'code_departamento' => '022', 'code_provincia' => '010'],
            ['name' => 'TACNA', 'code_pais' => '001', 'code_departamento' => '023', 'code_provincia' => '001'],
            ['name' => 'CANDARAVE', 'code_pais' => '001', 'code_departamento' => '023', 'code_provincia' => '002'],
            ['name' => 'JORGE BASADRE', 'code_pais' => '001', 'code_departamento' => '023', 'code_provincia' => '003'],
            ['name' => 'TARATA', 'code_pais' => '001', 'code_departamento' => '023', 'code_provincia' => '004'],
            ['name' => 'TUMBES', 'code_pais' => '001', 'code_departamento' => '024', 'code_provincia' => '001'],
            ['name' => 'CONTRALMIRANTE VILLAR', 'code_pais' => '001', 'code_departamento' => '024', 'code_provincia' => '002'],
            ['name' => 'ZARUMILLA', 'code_pais' => '001', 'code_departamento' => '024', 'code_provincia' => '003'],
            ['name' => 'CORONEL PORTILLO', 'code_pais' => '001', 'code_departamento' => '025', 'code_provincia' => '001'],
            ['name' => 'ATALAYA', 'code_pais' => '001', 'code_departamento' => '025', 'code_provincia' => '002'],
            ['name' => 'PADRE ABAD', 'code_pais' => '001', 'code_departamento' => '025', 'code_provincia' => '003'],
            ['name' => 'PURUS', 'code_pais' => '001', 'code_departamento' => '025', 'code_provincia' => '004'],
        ];

        foreach ($provinces as $province) {
            $department = Department::where('code_pais', '=', $province['code_pais'])
                        ->where('code_departamento', '=', $province['code_departamento'])
                        ->first();

            $cost = 15;
            if ($province['code_departamento']=='015') {
                $cost = 0;
            }

            if ($department) {
                Province::create([
                    'name' => $province['name'],
                    'cost' => $cost,
                    'department_id' => $department->id,
                    'code_pais' => $province['code_pais'],
                    'code_departamento' => $province['code_departamento'],
                    'code_provincia' => $province['code_provincia']
                ]);
            }
        }
    }
}
