<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Clientes extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'nome'  => $this->nome,
            'tel'   => $this->tel,
            'cpf'   => $this->cpf,
            'placa' => $this->placa
        ];
        //return parent::toArray($request);
    }
}
