<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CostCenterService;
use Illuminate\Http\Request;

class CostCenterController extends Controller
{
    protected $costCenterService;

    public function __construct( CostCenterService $costCenterService)
    {
        $this->costCenterService = $costCenterService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->costCenterService->getAll();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->costCenterService->create($request->all());

       return response()->json( $data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->costCenterService->show($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $this->costCenterService->updateById($id, $request);

        return response()->json( ['sucess'=> 'Centro de Custo alterado com sucesso']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->costCenterService->delete($id);

        return response()->json(['success'=>'Centro de custo apagado']);

    }
}
