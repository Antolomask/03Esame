<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CategoriaStoreRequest;
use App\Http\Requests\v1\CategoriaUpdateRequest;
use App\Http\Resources\v1\CategoriaCollection;
use App\Http\Resources\v1\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        $categoria = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $categoria = Categoria::all();
            } else {
                $categoria = Categoria::all()->where('visualizzato', 1);
            }
            return new CategoriaCollection($categoria);
        }  else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\v1\CategoriaStoreRequest $categoria
     * @return JsonResource
     */
    public function store(CategoriaStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $data = $request->validated();
            $categoria = Categoria::create($data);
            return new CategoriaResource($categoria);
        } else {
            abort(403,"PE_0006");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Categoria $categoria
     * @return JsonResource
     */
    public function show(Categoria $categoria)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore') || $categoria->visualizzato) {
                return new CategoriaResource($categoria);
            } else{
                abort(404,'PE_0003');
            }
        } else {
            abort(403,'PE_0002');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\v1\CategoriaUpdateRequest $request
     * @param  \App\Models\Categoria $categoria
     * @return JsonResource
     */
    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('Amministratore')){
                $data = $request->validated();
                $categoria->fill($data);
                $categoria->save();
                return new CategoriaResource($categoria);
            }else {
                abort(403,'PE_0004');
            }
        } else {
            abort(403,'PE_0005');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria $categoria
     * @return JsonResource
     */
    public function destroy(Categoria $categoria)
    {
        if (Gate::allows('eliminare')) {
            $categoria->deleteOrFail();
            return response()->noContent();
        } else {
            abort (403, 'PE_0006');
        }
    }
}
