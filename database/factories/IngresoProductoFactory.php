<?php

namespace Database\Factories;

use App\Models\IngresoProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IngresoProducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cantidad' => $this->faker->word,
        'precio_unitario' => $this->faker->randomDigitNotNull,
        'subtotal' => $this->faker->randomDigitNotNull,
        'lote' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
