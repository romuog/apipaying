<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('cost_center_id');
            $table->unsignedBigInteger('type_expense_id');
            $table->string('descricao')->nullable();
            $table->double('valor')->nullable();
            $table->timestamp('data_vencimento')->nullable();
            $table->timestamp('data_pagamento')->nullable();
            $table->string('tipo_pagamento')->nullable();
            $table->enum('status',['aberto','quitado','atrasado'])->nullable();
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('cost_center_id')->references('id')->on('cost_centers');
            $table->foreign('type_expense_id')->references('id')->on('type_expenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
