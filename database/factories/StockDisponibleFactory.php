<?php

namespace Database\Factories;

use App\Models\StockDisponible;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockDisponibleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockDisponible::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lote' => $this->faker->word,
        'cantidad_actual' => $this->faker->randomDigitNotNull,
        'institucion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
