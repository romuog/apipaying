<?php

namespace App\Services;

use App\Models\Expense;
use App\Models\Provider;

class ExpenseService
{
    public function getAllExpenses()
    {
        $expenses = Expense::all();

        return $expenses;

    }

    public function getExpenseByID($id)
    {
        $data = Expense::find($id);

        if (!$data){
            return response()->json(['error' => 'Despesa não localizada', 404]);
        } else{
            return response()->json($data);
        }
    }

    public function createExpense(array $data)
    {
        $data = Expense::create($data);

        return $data;

    }

    public function updateExpenseByID($id, $request)
    {

        $data = Expense::where('id',$id)->first();

        /**
         * Pessimistic Locking Provider
         */
        $provider = Provider::where('id', $data->provider_id)->lockForUpdate()->first();
        if(!$provider){
            return response()->json(['error'=>'Fornecedor não encontrato']);
        }

        $data->update($request->only(
            'provider_id',
            'cost_center_id',
            'type_expense_id',
            'descricao',
            'valor',
            'data_vencimento',
            'data_pagamento',
            'status',
        ));

        return $data;

    }

    public function deleteByID($id)
    {
        $data = Expense::find($id);
        if(!$data){
            return response()->json(['error' => 'Despesa não localizada',404]);
        } else {
            $data->delete();
            return response()->json(['success' => 'Despesa apagada com Sucesso', 201]);
        }

    }

}
