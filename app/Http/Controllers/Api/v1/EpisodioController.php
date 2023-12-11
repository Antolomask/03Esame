<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\EpisodioCollection;
use App\Http\Resources\v1\EpisodioResource;
use App\Models\Episodio;
use App\Models\SerieTv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EpisodioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function elencoTotaleEpisodi()
    {
        if (Gate::allows('Amministratore')) {
            return $episodio = Episodio::all();
        } else {
            abort(404, 'EC_0001');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        $episodio = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $episodio = Episodio::all();
            } else {
                $episodio = Episodio::all()->where('visualizzato', 1);
            }
            return new EpisodioCollection($episodio);
        } else {
            abort(403, 'EP_0001');
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
     * @param \App\Models\Episodio $idEpisodio
     * @return JsonResource
     */
    public function showSerie($idSerieTv)
    {
        // Recupero gli episodio associati a una serie TV
        $episodi = Episodio::where('idSerieTv', $idSerieTv)->get();

        //Verifico se ci sono episodi associati alla serie
        if ($episodi->isEmpty()) {
            abort(404, 'EP_0005');
        }

        // Applico la risorsa EpisodioResource a ciascun episodio nella collezione
        $episodiResource = EpisodioResource::collection($episodi);

        // Restituisco la risorsa 
        return $episodiResource;
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Episodio $idEpisodio
     * @return JsonResource
     */
    public function showEpisodio($idSerieTv, $idEpisodio)
    {
        $episodio = Episodio::find($idEpisodio);
        if (!$episodio) {
            abort(404, 'EP_0004');
        }

        if (Gate::allows('leggere')) {
            return new EpisodioResource($episodio);
        } else {
            abort(403, 'EP_0002');
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
}
