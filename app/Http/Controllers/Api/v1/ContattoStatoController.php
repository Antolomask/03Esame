<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ContattoStatoCollection;
use App\Http\Resources\v1\ContattoStatoResource;
use App\Models\Configurazione;
use App\Models\ContattoStato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContattoStatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContattoStato::all();
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
     * @param  \App\Models\ContattoStato $stato
     * @return JsonResource
     */
    public function show($idContattoStato)
    {
        // Trovo la configurazione con l'ID specifico:
        $stato = ContattoStato::find($idContattoStato);

        // Verifico se lo stato dell'utente è stata trovato
        if (!$stato) {
            // Gestiscoi il caso in cui lo stato non esista
            abort(404, 'CS_0001');
        }
        // Ritorna la risorsa della configurazione anzichè solo l'ID.
        return new ContattoStatoResource($stato);
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
