<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\ProviderService;

class ProviderController extends Controller
{
    protected $providerService;

    public function __construct( ProviderService $providerService)
    {
        $this->providerService = $providerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= $this->providerService->getAllProviders();

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
        $data = $this->providerService->create($request->all());

        return response()->json($data, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = $this->providerService->getProviderByID($id);

        return Response()->json($data, 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request )
    {
        $data= $this->providerService->updateProviderByID($id, $request);

        return response()->json(['sucess'=>'Fornecedor Atualizado com Sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->providerService->deleteByID($id);

        return response()->json(['success'=>'Fornecedor apagado com sucesso']);
    }
}
