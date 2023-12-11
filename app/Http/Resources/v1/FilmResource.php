<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'idFilm' => $this->idFilm,
            'idCategoria' => $this->idCategoria,
            'idTipologia' => $this->idTipologia,
            'nome' => $this->nome,
            'trama'=> $this->trama,
            'durataMin'=> $this->durataMin,
            'annoUscita'=> $this->annoUscita,
        ];
    }
}
