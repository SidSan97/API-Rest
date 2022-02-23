<?php

namespace App\Http\Controllers;
use App\Models\Clientes as Clientes;
use App\Http\Resources\Clientes as ClientesResource;


use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Clientes::paginate(15);
        return ClientesResource::collection($clientes);
      }
    
      public function show($id){
        $clientes = Clientes::findOrFail( $id );
        return new ClientesResource( $clientes );
      }
    
      public function store(Request $request){
        $clientes = new Clientes;
        $clientes->titulo = $request->input('titulo');
        $clientes->conteudo = $request->input('conteudo');
    
        if( $artigo->save() ){
          return new ClientesResource( $clientes );
        }
      }
    
       public function update(Request $request){
        $clientes = Clientes::findOrFail( $request->id );
        $clientes->titulo = $request->input('titulo');
        $clientes->conteudo = $request->input('conteudo');
    
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
}
