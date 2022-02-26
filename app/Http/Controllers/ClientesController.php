<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes as Clientes;
use App\Http\Resources\Clientes as ClientesResource;



class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Clientes::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Clientes;

        $clientes->nome  = $request->nome;
        $clientes->tel   = $request->tel;
        $clientes->cpf   = $request->cpf;
        $clientes->placa = $request->placa;

        if( $clientes->save() ){
        return new ClientesResource( $clientes );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = Clientes::findOrFail( $id );
        return new ClientesResource( $clientes );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $clientes = Clientes::findOrFail( $request->id );
        $clientes->nome  = $request->nome;
        $clientes->tel   = $request->tel;
        $clientes->cpf   = $request->cpf;
        $clientes->placa = $request->placa;

        if( $clientes->save() ){
        return new ClientesResource( $clientes );
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Clientes::findOrFail( $id );
        if( $clientes->delete() ){
        return new ClientesResource( $clientes );
        }

    }
}
