<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');
        Storage::deleteDirectory('products');
        
        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories');
        Storage::makeDirectory('products'); */
                
        $this->call(UserSeeder::class);
        /* $this->call(CategorySeeder::class); */
        /* $this->call(SubcategorySeeder::class); */

        /* $this->call(ProductSeeder::class); */

        $this->call(TallaSeeder::class);
        $this->call(ColorSeeder::class);
        /* $this->call(ColorProductSeeder::class); */
        /* $this->call(SizeSeeder::class); */

        /* $this->call(ColorSizeSeeder::class); */
        $this->call(CountrySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(ClientSeeder::class);

        $this->call(CatalogSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);

        $this->call(MomentcontactSeeder::class);
    }
}
