<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'institucion' => $this->faker->word,
        'consta_lista' => $this->faker->word,
        'eod' => $this->faker->word,
        'cedula' => $this->faker->word,
        'nombres' => $this->faker->word,
        'regimen_laboral' => $this->faker->word,
        'modalidad_laboral' => $this->faker->word,
        'tipo_nombramiento' => $this->faker->word,
        'unidad_operativa' => $this->faker->word,
        'area' => $this->faker->word,
        'denominacion_puesto' => $this->faker->word,
        'fecha_nacimiento' => $this->faker->word,
        'telefono' => $this->faker->word,
        'gestacion' => $this->faker->word,
        'maternidad' => $this->faker->word,
        'lactancia' => $this->faker->word,
        'enfermedad_catastrofica' => $this->faker->word,
        'tipo' => $this->faker->word,
        'discapacidad' => $this->faker->word,
        'cambio_administrativo' => $this->faker->word,
        'area_labora' => $this->faker->word,
        'nivel_ocupacional' => $this->faker->word,
        'covid' => $this->faker->word,
        'acepta_vacuna' => $this->faker->word,
        'usuario_digitador' => $this->faker->word,
        'puesto_vacunacion' => $this->faker->word,
        'primera_dosis_fecha' => $this->faker->word,
        'primera_dosis_hora' => $this->faker->word,
        'primera_equipo_vacunador' => $this->faker->word,
        'primera_dosis_vacunado' => $this->faker->word,
        'primera_dosis_observacion' => $this->faker->text,
        'segunda_dosis_fecha' => $this->faker->word,
        'segunda_dosis_hora' => $this->faker->word,
        'segunda_equipo_vacunador' => $this->faker->word,
        'segunda_dosis_vacunado' => $this->faker->word,
        'segunda_dosis_observacion' => $this->faker->text,
        'observacion' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
