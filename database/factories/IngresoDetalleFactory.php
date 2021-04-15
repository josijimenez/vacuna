<?php

namespace Database\Factories;

use App\Models\IngresoDetalle;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoDetalleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IngresoDetalle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_comprobante' => $this->faker->word,
        'fecha_emision' => $this->faker->word,
        'subtotal' => $this->faker->randomDigitNotNull,
        'iva' => $this->faker->randomDigitNotNull,
        'total' => $this->faker->randomDigitNotNull,
        'observacion' => $this->faker->word,
        'recibidoconforme' => $this->faker->word,
        'puestorecibidoconforme' => $this->faker->word,
        'entregadoconforme' => $this->faker->word,
        'puestoentregadoconforme' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
