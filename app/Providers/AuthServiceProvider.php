<?php

namespace App\Providers;

use App\Models\Contatto;
use App\Models\ContattoAbilita;
use App\Models\ContattoRuolo;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * NOTA: Eseguo prima un controllo per verificare le due tabelle esistano prima della creazione dei 
         * gate. Così facendo quando invio il comando 'php artisan migrate --seed' non viene citato
         * nessun errore. Se non facessi in questo mi uscirebbe il seguente errore:
         * 
         * SQLSTATE[42S02]: Base table or view not found: 1146 Table 'codex.utenti_ruoli' doesn't exist (SQL: select * from `utenti_ruoli` where `utenti_ruoli`.`deleted_at` is null).
         */

        if (Schema::hasTable("contattiRuoli") && Schema::hasTable("contattiAbilita")) {
            if (app()->environment() !== 'public') {
                // gate basato su un ruolo
                ContattoRuolo::all()->each(
                    function (ContattoRuolo $ruolo) {
                        Gate::define($ruolo->nome, function (Contatto $contatto) use ($ruolo) {
                            return $contatto->ruoli->contains('nome', $ruolo->nome);
                        });
                    }
                );

                ContattoAbilita::all()->each(function (ContattoAbilita $abilita) {
                    Gate::define($abilita->sku, function (Contatto $contatto) use ($abilita) {
                        $check = false;
                        foreach ($contatto->ruoli as $item) {
                            if ($item->abilita->contains('sku', $abilita->sku)) {
                                $check = true;
                                break;
                            }
                        }
                        return $check;
                    });
                });
            }
        }
    }
}
