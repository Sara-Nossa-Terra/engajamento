<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PessoasAjudadasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'tx_nome'       => $this->tx_nome,
            'dt_nascimento' => $this->dt_nascimento,
            'nu_telefone'   => $this->nu_telefone,
            'lider_id'      => $this->lider_id,
        ];
    }
}
