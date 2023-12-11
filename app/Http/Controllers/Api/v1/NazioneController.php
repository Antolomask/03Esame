<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\NazioneCollection;
use App\Http\Resources\v1\NazioneCompletoCollection;
use App\Http\Resources\v1\NazioneResource;
use App\Models\Nazione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        $idNazione = request("idNazione");

        if ($idNazione !== null) {
            // Se è fornito un ID, visualizza la singola nazione
            $nazione = Nazione::find($idNazione);
            if (!$nazione) {
                abort(404, 'NZ_0001'); // Se l'ID della nazione non esiste, restituisci un errore 404
            }
            return $this->creaCollection([$nazione]);
        } else {
            $continente = request("continente");
            $nazioniQuery = Nazione::query();
            if ($continente !== null) {
                $nazioniQuery->where('continente', $continente);
            }
            $nazioni = $nazioniQuery->get();
            return $this->creaCollection($nazioni);
        }
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
     * @param  \App\Models\Nazione $nazione
     * @return JsonResource
     */
    public function show(Nazione $nazione)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore') || $nazione->visualizzato) {
                return new NazioneResource($nazione);
            } else {
                abort(404, 'NZ_0003');
            }
        } else {
            abort(403, 'NZ_0002');
        }
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
    // -----------------------------------------------------------------------------//
    //          *****   PROTECTED   *****           //
    protected function creaCollection($nazioni)
    {
        $risorsa = null;
        $tipo = request("tipo");
        if ($tipo == "completo") {
            $risorsa = new NazioneCompletoCollection($nazioni);
        } else {
            $risorsa = new NazioneCollection($nazioni);
        }

        return $risorsa;
    }
}
