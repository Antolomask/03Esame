<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ComuneItalianoCollection;
use App\Http\Resources\v1\ComuneItalianoResource;
use App\Models\ComuneItaliano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ComuneItalianoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idComune = request('idComuneItaliano');

        if($idComune !== null){
            // Se è fornito un ID, visualizza il singolo Comune
            $comune = ComuneItaliano::find($idComune);
            if (!$comune) {
                abort(404, 'CIC_0001');
            }
            return new ComuneItalianoCollection($comune);
        } else {
            $regione = request("regione");
            $comuniQuery = ComuneItaliano::query();
            if ($regione !== null) {
                $comuniQuery->where('regione', $regione);
            }
            $comuni = $comuniQuery->get();
            return new ComuneItalianoCollection($comuni);

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
     * @param \App\Models\ComuneItaliano $comune
     * @return JsonResource
     */
    public function show(ComuneItaliano $comune)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore') || $comune->visualizzato) {
                return new ComuneItalianoResource($comune);
            } else{
                abort(404,'CI_0003');
            }
        } else {
            abort(403,'CI_0002');
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
