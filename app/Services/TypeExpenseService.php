<?php

namespace App\Services;

use App\Models\TypeExpense;

class TypeExpenseService
{
    public function getallTypes()
    {
        $typeExpenses=TypeExpense::all();

        return $typeExpenses;
    }

    public function getTypeByID($id)
    {
        $data = TypeExpense::find($id);

        if(!$data){
            return response()->json(['error'=>'Tipo de Despesa não encontrada']);
        } else {
            return response()->json($data);
        }

    }

    public function createTypeExpense(array $data)
    {
        $typeExpense = TypeExpense::create($data);

        return $typeExpense;
    }

    public function updateByID($id, $request)
    {
        $data = TypeExpense::where('id',$id)->update($request->only('descricao'));

        return $data;
    }

    public function delete($id)
    {
        $data = TypeExpense::find($id);

        if(!$data){
            return response()->json(['error'=> 'Tipo de despesa não localizada']);
        }else {
            $data->delete();
            return response()->json(['success'=>'Tipo de despesa apagado com sucesso']);
        }
    }

}
