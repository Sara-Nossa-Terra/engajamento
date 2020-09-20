<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AtividadesResource extends JsonResource
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
            'id'         => $this->id,
            'tx_nome'    => $this->tx_nome,
            'dt_dia'     => $this->dt_dia,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
