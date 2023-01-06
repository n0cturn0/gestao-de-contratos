<?php

namespace Database\Factories;

use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendedorFactory extends Factory
{
    protected $model = Vendedor::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vendedor' => $this->faker->word,
            'fone'      =>$this->faker->randomNumber(9)
        ];
    }
}
