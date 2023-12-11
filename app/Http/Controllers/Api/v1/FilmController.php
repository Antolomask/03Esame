<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FilmStoreRequest;
use App\Http\Requests\v1\FilmUpdateRequest;
use App\Http\Resources\v1\FilmCollection;
use App\Http\Resources\v1\FilmResource;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTipologia($idTipologia)
    {
        // Recupero dei film dall'ID tipologia
        $film = Film::where('idTipologia', $idTipologia)->get();

        // Restituisco il risultato
        return new FilmCollection($film);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $film = Film::all();
            } else {
                $film = Film::all()->where('visualizzato', 1);
            }
            return new FilmCollection($film);
        } else {
            abort(403, 'FC_0001');
        }
    }

    /**
     * Display a listing of the resource from categoria
     * 
     * @param string $idTipologia
     * @return JsonResource
     */
    public function indexCategoria($idTipologia)
    {
        if (Gate::allows('leggere')) {
            $idTipologia = (request('idTipologia') != null) ? request('idTipologia') : null;
            if (Gate::allows('Amministratore')) {
                if ($idTipologia != null) {
                    $film = Film::all()->where('idTipologia', $idTipologia);
                } else {
                    $film = Film::all();
                }                
            } else {
                if ($idTipologia != null) {
                    $film = Film::all()->where('idTipologia', $idTipologia)->where('visualizzato', 1);
                } else {
                    $film = Film::all()->where('visualizzato', 1);
                }
            }
            return new FilmCollection($film);
        } else {
            abort(403,'FC_0002');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\v1\FilmStoreRequest  $request
     * @return JsonResource
     */
    public function store(FilmStoreRequest $request)
    {
        if (Gate::allows("Amministratore")) {
            $data = $request->validated();
            $film = Film::create($data);
            return new FilmResource($film);
        } else {
            abort(403,"FC_0006");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film $idFilm
     * @return JsornResource
     */
    public function show(Film $idFilm)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore') || $idFilm->visualizzato) {
                return new FilmResource($idFilm);
            } else{
                abort(404,'FC_0003');
            }
        } else {
            abort(403,'FC_0002');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FilmUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmUpdateRequest $request, $idFilm)
    {
        $film = Film::findOrFail($idFilm);

        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')){
                $data = $request->validated();
                $film->fill($data);
                $film->save();
                return new FilmResource($film);
            }else {
                abort(403,'FC_0004');
            }
        } else {
            abort(403,'FC_0005');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film $film
     * @return JsonResource
     */
    public function destroy(Film $film)
    {
        if (Gate::allows('eliminare')) {
            $film->deleteOrFail();
            return response()->noContent();
        } else {
            abort (403, 'PE_0006');
        }
    }
}
