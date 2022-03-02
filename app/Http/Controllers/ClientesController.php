<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use APP\Http\Requests\ValidaFormRequest;
use App\Models\Clientes as Clientes;
use App\Http\Resources\Clientes as ClientesResource;


class ClientesController extends Controller
{
    public function index(){
        return Clientes::all();
      }

      public function show($id){
        $clientes = Clientes::findOrFail( $id );
        return new ClientesResource( $clientes );
      }

      public function store(ValidaFormRequest $request){
        $clientes = new Clientes;
        $clientes->nome  = $request->input('nome');
        $clientes->tel   = $request->input('tel');
        $clientes->cpf   = $request->input('cpf');
        $clientes->placa = $request->input('placa');

        if( $clientes->save() ){
          return new ClientesResource( $clientes );
        }
      }

       public function update(Request $request){
        $clientes = Clientes::findOrFail( $request->id );
        $clientes->nome  = $request->input('nome');
        $clientes->tel   = $request->input('tel');
        $clientes->cpf   = $request->input('cpf');
        $clientes->placa = $request->input('placa');

        if( $clientes->save() ){
          return new ClientesResource( $clientes );
        }
      }

      public function destroy($id){
        $clientes = Clientes::findOrFail( $id );
        if( $clientes->delete() ){
          return new ClientesResource( $clientes );
        }

      }

    public function showPlaca($num)
    {
        return Clientes::where('placa', 'like', '%' . $num)->get();
    }
}
