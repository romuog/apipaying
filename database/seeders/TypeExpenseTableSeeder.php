<?php

namespace Database\Seeders;

use App\Models\TypeExpense;
use Illuminate\Database\Seeder;

class TypeExpenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeExpense::factory(5)->create();
    }
}
