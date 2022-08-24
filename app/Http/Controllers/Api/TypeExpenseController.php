<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeExpense;
use Illuminate\Http\Request;
use App\Services\TypeExpenseService;

class TypeExpenseController extends Controller
{
    protected $typeExpenseService;

    public function __construct( TypeExpenseService $typeExpenseService)
    {
        $data = $this->typeExpenseService = $typeExpenseService;

        return response()->json($data);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->typeExpenseService->getallTypes();

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
        $data= $this->typeExpenseService->createTypeExpense($request->all());

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
        $data = $this->typeExpenseService->getTypeByID($id);

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
        $this->typeExpenseService->updateByID($id, $request);

        return response()->json(['sucess'=> 'Tipo de despesa alterada com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->typeExpenseService->delete($id);

        return response()->json(['sucess'=>'Tipo de Despesa apagado com sucesso']);

    }
}
