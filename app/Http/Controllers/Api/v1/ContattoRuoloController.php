<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ContattoRuoloStoreRequest;
use App\Http\Requests\v1\ContattoRuoloStoreResource;
use App\Http\Resources\v1\ContattoRuoloCollection;
use App\Http\Resources\v1\ContattoRuoloResource;
use App\Models\ContattoRuolo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContattoRuoloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContattoRuolo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\v1\ContattoRuoloStoreRequest $ruolo
     * @return JsonResource
     */
    public function store(ContattoRuoloStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Requests\v1\ContattoRuolo $ruolo 
     * @return JsonResource
     */
    public function show($idContattoRuolo)
    {
        // Trovo la configurazione con l'ID specifico:
        $ruolo = ContattoRuolo::find($idContattoRuolo);

        // Verifico se lo stato dell'utente è stata trovato
        if (!$ruolo) {
            // Gestiscoi il caso in cui lo stato non esista
            abort(404, 'CS_0001');
        }
        // Ritorna la risorsa della configurazione anzichè solo l'ID.
        return new ContattoRuoloResource($ruolo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
