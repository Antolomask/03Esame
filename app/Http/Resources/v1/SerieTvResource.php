<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class SerieTvResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "idSerieTv"=> $this->idSerieTv,
            "idCategoria"=> $this->idCategoria,
            "idTipologia"=> $this->idTipologia,
            "nome"=> $this->nome,
            "trama"=> $this->trama,
            "stagioni"=> $this->stagioni,
            "episodi"=> $this->episodi,
            "annoUscita"=> $this->annoUscita,
        ];
    }
}
