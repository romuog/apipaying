<?php

namespace Database\Factories;

use App\Models\Provider;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'tipo' => $this->faker->randomElement(['Pessoa fisica','Pessoa Juridica']),
            'email' => $this->faker->safeEmail(),
            'telefone' => '84999929103',
            'rua' => 'rua do antimonio',
            'n' => '37',
            'bairro' => ' Centro',
            'cidade' => 'Currais Novos',
            'estado' => ' Rio Grando do Norte',
            'complemento' => 'preto da pista de skate',
            'cpf_cnpj' => '654665465565',
        ];
    }
}
