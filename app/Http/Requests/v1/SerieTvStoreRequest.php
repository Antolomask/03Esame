<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class SerieTvStoreRequest extends FormRequest
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
            "idSerieTv" => 'required|integer',
            "idCategoria" => 'required|integer',
            "idTipologia" => 'required|integer',
            "nome" => 'required|string|max:45',
            "trama" => 'required|string|max:255',
            "stagioni" => 'required|string|max:45',
            "episodi" => 'required|string|max:10',
            "annoUscita" => 'required|char|max:4',
        ];
    }
}
