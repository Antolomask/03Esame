<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class EpisodioStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idEpisodio' => 'required|integer',
            'idSerieTv'=> 'required|integer',
            'idTipologia'=> 'required|integer',
            'nome'=> 'required|string|max:45',
            'stagione'=> 'required|string|max:45',
            'durataEpisodioMin'=> 'required|string|max:45',
        ];
    }
}
