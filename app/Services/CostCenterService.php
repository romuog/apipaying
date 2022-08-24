<?php

namespace App\Services;

use App\Models\CostCenter;

class CostCenterService
{
    public function getAll()
    {
        $costCenters=CostCenter::all();

        return $costCenters;
    }

    public function create(array $data)
    {
        $costCenter = CostCenter::create($data);

        return ($costCenter);
    }

    public function show($id)
    {
        $data = CostCenter::find($id);

        if (!$data){
            return response()->json(['error'=> 'Centro de custo não localizada',404]);
        } else {
            return response()->json($data);
        }
    }

    public function updateById($id, $request)
    {

        //dd($id, $request->only('descricao'));

        $data = CostCenter::where('id', $id)->update($request->only('descricao'));

        return $data;
    }

    public function delete($id)
    {
        $data = CostCenter::find($id);

        if(!$data){
            return response()->json(['error'=> 'Centro de custo não localizado']);
        }else {
            $data->delete();
            return response()->json(['success'=>'Centro de custo apagado']);
        }
    }




}
