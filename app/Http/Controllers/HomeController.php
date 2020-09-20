<?php

namespace App\Http\Controllers;


use App\Events\HomeEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DateController;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(Request $request)
    {
        // event(new HomeEvent('Acesso detectado na home'));
        
        // $entradas = DB::table('entradas')
        // ->whereBetween('data', DateController::getPeriodo())->orderBy('data')->get();
        // $totalEntradas = $entradas->sum('valor');
        
        // $saidas = DB::table('saidas')
        // ->whereBetween('data', DateController::getPeriodo())->orderBy('data')->get();
        // $totalSaidas = $saidas->sum('valor');
        
        // $resultado = $totalEntradas - $totalSaidas;
        // $classResult = $resultado > 0 ? 'bg-aqua' : 'bg-red';
        
        // $dadosPagina = [
        //     'titulo'            => 'Início - Balanço',
        //     'classResultado'    => $classResult,
        //     'subtituloEsquerda' => 'Entradas',
        //     'subtituloDireita'  => 'Saídas',
        //     'rota'              => 'home',
        //     'rotaPeriodo'       => 'home',
        //     'dataIni'           => DateController::getdataIni(),
        //     'dataFim'           => DateController::getdataFim(),
        // ];

        return redirect()->route('orcamento.index');
        
        //return view('home', compact('entradas', 'totalEntradas', 'saidas', 'totalSaidas', 'resultado', 'dadosPagina'));
    }
}