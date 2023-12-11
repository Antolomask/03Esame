<?php

use App\Helpers\AppHelpers;
use App\Http\Controllers\api\v1\AccediController;
use App\Http\Controllers\Api\v1\CategoriaController;
use App\Http\Controllers\Api\v1\ComuneItalianoController;
use App\Http\Controllers\Api\v1\ConfigurazioneController;
use App\Http\Controllers\Api\v1\ContattoController;
use App\Http\Controllers\Api\v1\EpisodioController;
use App\Http\Controllers\Api\v1\FilmController;
use App\Http\Controllers\Api\v1\NazioneController;
use App\Http\Controllers\Api\v1\SerieTvController;
use App\Http\Controllers\Api\v1\ContattoRuoloController;
use App\Http\Controllers\api\v1\ContattoStatoController;
use App\Models\SerieTv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

if (!defined('_VERS')) {
    define('_VERS', 'v1');
}

Route::get(_VERS . '/testLogin', function () {
    $hashUser = "9c423e30cfa293ec36c9cd3e4c76c32478d122ca5f6af628ff2fa4f590ec5ecf4939b7b32bbe11c9c46c0d5250dd5ec84a0d539889e7f973e76f8394f679cc7e";
    $psw = "da2ca4a2b6616e28479a372752377f23a2361e1df855d881ac987341f837e3f260f6d5d68e40f0b1fb62d98e3309a3593b12314d6e7b91179642426709c5d6f5";
    $sale = "868e10880dd824ec8a83eb8c724d2d8192addcfe933eb5177dc509fbf486ec28fe67d350c5a81cb5608736c670e14bafdad732c4a99aab02b8d8b2a6e5b3a7fe";

    $hashSalePsw = AppHelpers::nascondiPassword($psw, $sale);

    AccediController::testLogin($hashUser, $hashSalePsw);
});

// *** API ACCESSO : TUTTI *** 
Route::get(_VERS . '/accedi/{utente}/{hash?}', [AccediController::class,'show']);
Route::get(_VERS . '/hash/{stringa}', [AccediController::class,'hash']);
Route::post(_VERS . '/registrazione/', [ContattoController::class,'registra']);

// - configurazioni -
Route::get(_VERS . '/configurazioni', [ConfigurazioneController::class,'index']);
Route::get(_VERS . '/configurazioni/{idConfigurazione}', [ConfigurazioneController::class,'show']);

// - ruoli utenti -
Route::get(_VERS . '/contattiRuoli', [ContattoRuoloController::class,'index']);
Route::get(_VERS . '/contattiRuoli/{idContattoRuolo}', [ContattoRuoloController::class,'show']);

// - stati utente -
Route::get(_VERS . '/contattiStati', [ContattoStatoController::class,'index']);
Route::get(_VERS . '/contattiStati/{idContattoStato}', [ContattoStatoController::class,'show']);

// - comuni italiani -
Route::get(_VERS . '/comuniItaliani', [ComuneItalianoController::class,'index']);
Route::get(_VERS . '/comuniItaliani{idComuneItaliano}', [ComuneItalianoController::class,'show']);

// - nazioni -
Route::get(_VERS . '/nazioni', [NazioneController::class,'index']);
Route::get(_VERS . '/nazioni/{idNazione}', [NazioneController::class,'index']);

// ---------------------------------------------------------------------------------------------------------|

// *** API ACCESSO : AMMINISTRATORE, UTENTE ***
Route::middleware('autenticazione', 'contattoRuolo:Amministratore,Utente')->group(function () {
    
    // - categorie - 
    Route::get(_VERS . '/categorie', [CategoriaController::class,'index']); 
    Route::get(_VERS . '/categorie/{categoria}', [CategoriaController::class,'show']); 

    // - contatti -
    Route::get(_VERS . '/contatti/{idContatto}', [ContattoController::class,'show']); 
    Route::put(_VERS . '/contatti/{idContatto}', [ContattoController::class,'update']); 
    Route::post(_VERS . '/contatti/', [ContattoController::class,'store']);
    Route::delete(_VERS . '/contatti/{idContatto}', [ContattoController::class,'destroy']);

    // - film -
    Route::get(_VERS . '/films', [FilmController::class,'index']); 
    Route::get(_VERS . '/films/tipologia/{idTipologia}', [FilmController::class,'indexTipologia']); 
    Route::get(_VERS . '/films/{idFilm}', [FilmController::class,'show']); 

    // - serieTv -
    Route::get(_VERS . '/serieTv', [SerieTvController::class,'index']);
    Route::get(_VERS . '/serieTv/tipologia/{idTipologia}', [SerieTvController::class,'indexTipologia']); 
    Route::get(_VERS . '/serieTv/{idSerieTv}', [SerieTvController::class,'show']);


    // - episodi -
    Route::get(_VERS . '/serieTv/{idSerieTv}/episodi', [EpisodioController::class,'showSerie']);
    Route::get(_VERS . '/serieTv/{idSerieTv}/episodi/{idEpisodio}', [EpisodioController::class,'showEpisodio']);  
});

// ---------------------------------------------------------------------------------------------------------|

// *** API ACCESSO : AMMINISTRATORE ***
Route::middleware('autenticazione', 'contattoRuolo:Amministratore')->group(function () {

    // - categorie -
    Route::post(_VERS . '/categorie', [CategoriaController::class,'store']); 
    Route::put(_VERS . '/categorie/{categoria}', [CategoriaController::class,'update']); 
    Route::delete(_VERS . '/categorie/{categoria}', [CategoriaController::class,'destroy']); 
    
    // - contatti -
    Route::get(_VERS . '/contatti', [ContattoController::class,'index']);
    
    // - film - 
    Route::post(_VERS . '/films', [FilmController::class,'store']); 
    Route::put(_VERS . '/films/{idFilm}', [FilmController::class,'update']); 
    Route::delete(_VERS . '/films/{idFilm}', [FilmController::class,'destroy']); 

    // - serieTv -
    Route::post(_VERS . '/serieTv', [SerieTvController::class,'store']); 
    Route::put(_VERS . '/serieTV/{idSerieTv}', [SerieTvController::class,'update']); 
    Route::delete(_VERS . '/serieTv/{idSerieTv}', [SerieTvController::class,'destroy']); 

    // - episodi - 
    Route::get(_VERS . '/episodi', [EpisodioController::class,'elencoTotaleEpisodi']); 
    Route::post(_VERS . '/serieTV/{idSerieTv}/episodi', [EpisodioController::class,'store']);
    Route::put(_VERS . '/serieTV/{idSerieTv}/episodi/{idEpisodio}', [EpisodioController::class,'update']); 
    Route::delete(_VERS . '/serieTV/{idSerieTv}/episodi/{idEpisodio}', [EpisodioController::class,'destroy']); 
});