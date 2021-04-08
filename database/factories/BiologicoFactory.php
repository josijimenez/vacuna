<?php

namespace Database\Factories;

use App\Models\Biologico;
use Illuminate\Database\Eloquent\Factories\Factory;

class BiologicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Biologico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lote' => $this->faker->word,
        'marca' => $this->faker->word,
        'fecha_caducidad' => $this->faker->word,
        'codigo_cum' => $this->faker->word,
        'descripcion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
