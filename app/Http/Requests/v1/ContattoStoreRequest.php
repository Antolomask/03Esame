<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ContattoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "idContattoStato" => "required|integer",
            "nome" => "required|string|max:45",
            "cognome" => "required|string|max:45",
            "sesso" => "integer",
            "codiceFiscale" =>"string|max:45",
            "partitaIva" => "string|max:45", 
            "cittadinanza" => "string|max:45", 
            "idNazioneNascita" => "string|max:45", 
            "cittaNascita" => "string|max:45", 
            "provinciaNascita"=> "string|max:45", 
            "dataNascita"=> "string|max:255",
        ];
    }
}
