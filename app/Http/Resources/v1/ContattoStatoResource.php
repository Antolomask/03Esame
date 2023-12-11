<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ContattoStatoResource extends JsonResource
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
            "idContattoStato"=> $this->idContattoStato,
            "valore"=> $this->valore,
        ];
    }
}