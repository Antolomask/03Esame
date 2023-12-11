<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ContattoStoreRequest;
use App\Http\Requests\v1\ContattoUpdateRequest;
use App\Http\Resources\v1\ContattoCollection;
use App\Http\Resources\v1\ContattoResource;
use App\Models\Contatto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContattoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                return Contatto::all();
            } else {
                abort(403, 'UT_0002: Utente non autorizzato');
            }
        } else {
            abort(404, 'UT_0001');
        }
    }

    /**
     * Registrazione
     *
     * @return \Illuminate\Http\Response
     */
    public function registra()
    {
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \IApp\Http\Requests\v1\ContattoStoreRequest  $contatto
     * @return JsonResource
     */
    public function store(ContattoStoreRequest  $request)
    {
        if (Gate::allows("creare")) {
            $data = $request->validated();
            $contatto = Contatto::create($data);
            return new ContattoResource($contatto);
        } else {
            abort(403, "UT_0003");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contatto $contatto
     * @return JsonResource
     */
    public function show($idContatto)
    {
        $contatto = $this->trovaID($idContatto);

        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore') || $contatto->visualizzato) {
                return new ContattoResource($contatto);
            } else {
                abort(404, 'UT_0005');
            }
        } else {
            abort(403, 'UT_0004');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\v1\ContattoUpdateRequest $request
     * @param  \App\Models\Contatto $contatto
     * @return JsonResource
     */
    public function update(ContattoUpdateRequest $request, Contatto $contatto, $idContatto)
    {
        $contatto = $this->trovaID($idContatto);

        if (Gate::allows('aggiornare')) {
            $data = $request->validated();
            $contatto->fill($data);
            $contatto->save();
            return new ContattoResource($contatto);
        } else {
            abort(403, 'UT_0007');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contatto $contatto
     * @return JsonResource
     */
    public function destroy(Contatto $contatto)
    {
        if (Gate::allows('eliminare')) {
            $contatto->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'UT_0008');
        }
    }

    // *** PROTECTED *** 
    /**
     * Trova un contatto dato un determinato ID.
     *
     * Questa funzione cerca un contatto utilizzando l'ID fornito.
     * Se il contatto non viene trovato, genera un errore 404.
     *
     * @param int $idContatto L'ID del contatto da cercare.
     * @return Contatto Il contatto trovato.
     */

    public function trovaID($idContatto)
    {
        $contatto = Contatto::find($idContatto);

        if (!$contatto) {
            abort(404, 'ID non trovato');
        }

        return $contatto;
    }
}
