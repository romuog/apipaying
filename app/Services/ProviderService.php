<?php

namespace App\Services;

use App\Models\Provider;

class ProviderService
{
    public function getAllProviders()
    {
        $providers = Provider::all();

        return $providers;
    }

    public function create(array $data)
    {
        $provider = provider::create($data);

        return $data;

    }

    public function getProviderByID($id)
    {
        $data = Provider::find($id);

        if (!$data){
            return response()->json(['error' => 'não encontrado'],404);
        }else {
            return response()->json($data);
        }
    }

    public function updateProviderByID($id, $request)
    {

        $data = Provider::where('id',$id)->lockForUpdate()->update($request->only(
            'nome',
            'tipo',
            'email',
            'telefone',
            'rua',
            'n',
            'bairro',
            'cidade',
            'estado',
            'complemento',
            'cpf_cnpj'
        ));
         return $data;
    }

    public function deleteByID($id)
    {
        $data = Provider::find($id);
        if(!$data){
            return response()->json(['error'=> 'Fornecedor não localizado']);
        }else {

            $data->delete();
            return response()->json(['success'=>'Fornecedor apagado']);
        }


    }

}
