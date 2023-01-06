<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estado = array('MS', 'SP', 'MT');
        return [
            'cliente'   => $this->faker->word,
            'cnpj'      => $this->faker->randomNumber(9),
            'estado'      => $this->faker->shuffleString('MS','UTF-8'),
            'cidade'      => $this->faker->word,
            'bairro'      => $this->faker->word,
            'rua'      => $this->faker->word,
            'numero'      => $this->faker->randomNumber(3)


        ];
    }
}
