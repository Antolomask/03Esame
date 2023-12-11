<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ComuneItalianoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return $this->getCampi();
    }


    // PROTECTED // 
    protected function getCampi() 
    {
        return [
            "idComuneItaliano"=> $this->idComuneItaliano,
            "nome"=> $this->nome,
            "regione"=> $this->regione,
            "metropolitana"=> $this->metropolitana,
            "sigliaAutomobilistica"=> $this->sigliaAutomobilistica,
            "cap"=> $this->cap,
        ];
    }
}
