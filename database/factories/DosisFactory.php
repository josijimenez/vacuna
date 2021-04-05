<?php

namespace Database\Factories;

use App\Models\Dosis;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dosis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'puesto' => $this->faker->word,
        'vacuna' => $this->faker->word,
        'catidad' => $this->faker->randomDigitNotNull,
        'fecha' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
