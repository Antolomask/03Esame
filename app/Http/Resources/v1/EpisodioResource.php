<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class EpisodioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "idEpisodio"=> $this->idEpisodio,
            "idSerieTv"=> $this->idSerieTv,
            "idTipologia"=> $this->idTipologia,
            "nome"=> $this->nome,
            "stagione"=> $this->stagione,
            "durataEpisodioMin"=> $this->durataEpisodioMin,
        ];
    }
}
