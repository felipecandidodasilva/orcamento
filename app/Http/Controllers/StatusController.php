<?php

namespace App\Http\Controllers;

use App\Model\Orcamento;
use App\Model\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stat = status::all();
        $dadosPagina = [
            'titulo' => 'Status',
            'form' => 'status.StatusForm',
            'caminhos' => [
                [
                 'descricao' => 'Status',
                    'rota' => '#'
                ],
            ],
        ];

        return view('status.index',compact('stat','dadosPagina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input["description"] ? '' : dd("Descrição Não informada");
        status::create($input);
        return redirect()->route('status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(status $status)
    {
        $orcamentos = Orcamento::where('status_id',$status->id)->get();
        if(count($orcamentos) > 0){
            dd("Existem Orçamentos com esse Status, Troque o Status dos orçamentos antes de excluir este.");
        }
        $status->delete();
        return redirect()->route('status.index');
    }
}
