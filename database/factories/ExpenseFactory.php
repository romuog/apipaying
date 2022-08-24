<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = now();
        return [
            'provider_id'=> $this->faker->randomElement(['1','2','3','4','5']),
            'cost_center_id'=> $this->faker->randomElement(['1','2','3','4','5']),
            'type_expense_id'=> $this->faker->randomElement(['1','2','3','4','5']),
            'descricao'=> $this->faker->sentence(3),
            'valor'=> $this->faker->randomElement(['100','200','350','410','525']),
            'data_vencimento'=> '2022-10-15 10:15:10',
            'data_pagamento'=> null,
            'status'=> $this->faker->randomElement(['aberto','quitado','atrasado']),
        ];
    }
}
