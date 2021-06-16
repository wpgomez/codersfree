<?php

namespace Database\Factories;

use App\Models\Catalogpage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogpageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Catalogpage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_normal' => 'catalogpages/' . $this->faker->image('public/storage/catalogpages', 1270, 1625, null, false),
            'image_small' => 'catalogpages/' . $this->faker->image('public/storage/catalogpages', 635, 813, null, false)
        ];
    }
}
