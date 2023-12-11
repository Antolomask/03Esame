<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ConfigurazioneCollection;
use App\Http\Resources\v1\ConfigurazioneResource;
use App\Models\Configurazione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConfigurazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return Configurazione::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Configurazione $configurazione
     * @return JsonResource
     */
    public function show($idConfigurazione)
    {
        // Trovo la configurazione con l'ID specifico:
        $configurazione = Configurazione::find($idConfigurazione);

        // Verifico se la configurazione è stata trovata
        if (!$configurazione) {
            // Gestisco il caso in cui la configurazione non esista 
            abort(404, 'CC_0001');
        }
        // Ritorna la risorsa della configurazione anzichè solo l'ID
        return new ConfigurazioneResource($configurazione);
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
