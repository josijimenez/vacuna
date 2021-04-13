<?php

namespace Database\Factories;

use App\Models\Integrante;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntegranteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Integrante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo' => $this->faker->word,
        'integrante_user_id' => $this->faker->randomDigitNotNull,
        'estado' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
