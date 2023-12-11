<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SerieTvStoreRequest;
use App\Http\Requests\v1\SerieTvUpdateRequest;
use App\Http\Resources\v1\SerieTvCollection;
use App\Http\Resources\v1\SerieTvResource;
use App\Models\SerieTv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SerieTvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTipologia($idTipologia)
    {
        // Recupero dei film dall'ID tipologia
        $serieTv = SerieTv::where('idTipologia', $idTipologia)->get();

        // Restituisco il risultato
        return new SerieTvCollection($serieTv);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serieTv = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $serieTv = SerieTv::all();
            } else {
                $serieTv = SerieTv::all()->where('visualizzato', 1);
            }
            return new SerieTvCollection($serieTv);
        } else {
            abort(403, 'STV_0001');
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
                    $serieTv = SerieTv::all()->where('idTipologia', $idTipologia);
                } else {
                    $serieTv = SerieTv::all();
                }                
            } else {
                if ($idTipologia != null) {
                    $serieTv = SerieTv::all()->where('idTipologia', $idTipologia)->where('visualizzato', 1);
                } else {
                    $serieTv = SerieTv::all()->where('visualizzato', 1);
                }
            }
            return new SerieTvCollection($serieTv);
        } else {
            abort(403,'STV_0002');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\v1\SerieTvStoreRequest  $request
     * @return JsonResource
     */
    public function store(SerieTvStoreRequest $request)
    {
        if (Gate::allows("Amministratore")) {
            $data = $request->validated();
            $serie = SerieTv::create($data);
            return new SerieTvResource($serie);
        } else {
            abort(403,"STV_0006");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SerieTv $idSerieTv
     * @return JsornResource
     */
    public function show($idSerieTv)
{
    // Trova la serie TV con l'ID specificato
    $serieTv = SerieTv::findOrFail($idSerieTv);
    
    if (Gate::allows('leggere')) {
        if (Gate::allows('Amministratore') || $serieTv->visualizzato) {
            // Ritorna solo la serie TV corrispondente all'ID
            return new SerieTvResource($serieTv); 
        } else {
            // Non autorizzato a visualizzare questa serie TV
            abort(403, 'STV_0002'); 
        }
    } else {
        // Non autorizzato a visualizzare questa serie TV
        abort(403, 'STV_0002'); 
    }
}

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FilmUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SerieTvUpdateRequest $request, $idSerieTv)
    {
        $serie = SerieTv::findOrFail($idSerieTv);

        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')){
                $data = $request->validated();
                $serie->fill($data);
                $serie->save();
                return new SerieTvResource($serie);
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
     * @param  \App\Models\SerieTv $serie
     * @return JsonResource
     */
    public function destroy(SerieTv $serie)
    {
        if (Gate::allows('eliminare')) {
            $serie->deleteOrFail();
            return response()->noContent();
        } else {
            abort (403, 'PE_0006');
        }
    }
}
