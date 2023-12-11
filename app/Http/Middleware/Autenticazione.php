<?php

namespace App\Http\Middleware;

use App\Http\Controllers\api\v1\AccediController;
use App\Models\Contatto;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autenticazione
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = null;
        if (isset($_SERVER['HTTP_AUTHORIZATION']) && $_SERVER['HTTP_AUTHORIZATION'] !== null) {
            // non funziona su Apache ma su Artisan si
            $token = $_SERVER['HTTP_AUTHORIZATION'];
            $token = trim(str_replace("Bearer", "", $token));
        } elseif (isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_PW'] !== null) {
            // usare con il server Apache
            $token = $_SERVER['PHP_AUTH_PW'];
        }


        if ($token !== null) {
            $payload = AccediController::verificaToken($token);
            if ($payload != null) {
                $contatto = Contatto::where("idContatto", $payload->data->idContatto)->firstOrFail();
                if ($contatto->idContattoStato == 1) {
                    // print_r($utente->ruoli->pluck('nome')->toArray());
                    Auth::login($contatto);
                    print_r($request["contattiRuoli"]);
                    $request["contattiRuoli"] = $contatto->ruoli->pluck('nome')->toArray();
                    return $next($request);
                } else {
                    abort(403, 'TK_0002');
                }
            } else {
                abort(403, 'TK_0001');
            }
        }
    }
}
