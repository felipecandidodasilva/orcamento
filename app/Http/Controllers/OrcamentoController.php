<?php

namespace App\Http\Controllers;

use App\Model\arquivo;
use App\Model\orcamento;
use App\User;
use App\Model\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use stdClass;

class OrcamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataIni = session('dataIni', date('Y-m-01'));
        $dataFim = session('dataFim', date('Y-m-t'));

        $dadosPagina = [
            'titulo' => 'Orçamentos',
            'caminho' => 'Orçamentos',
            'dataIni' => $dataIni,
            'dataFim' => $dataFim,
            'alert-rodape' => 'alert-success',
            'rota' => 'orcamento.',
            'caminhos' => [
                [
                    'descricao' => 'Orçamentos',
                    'rota' => route('orcamento.index')
                ],
                [
                    'descricao' => 'Novo Orçamento',
                    'rota' => route('orcamento.create')
                ],
            ]
        ];

        $orcamentos = Orcamento::listaOrcamento();

        //dd($orcamentos);

        return view('orcamento.index', compact('orcamentos','dadosPagina'));
    }


    public function create()
    {
        $dataIni = session('dataIni', date('Y-m-01'));
        $dataFim = session('dataFim', date('Y-m-t'));

        $users = User::all();
        $dadosPagina = [
            'titulo' => 'Novo Orçamento',
            'dataIni' => $dataIni,
            'dataFim' => $dataFim,
            'rotaForm' => route('orcamento.store'),
            'alert-rodape' => 'alert-success',
            'caminhos' => [
                [
                    'descricao' => 'Orçamentos',
                    'rota' => route('orcamento.index')
                ],
                [
                    'descricao' => 'Novo Orçamento',
                    'rota' => route('orcamento.create')
                ],
            ]
        ];
        $status = Status::all();
        $orcamento = new Orcamento(); // para preencher as variáveis do formulário

    
        return view('orcamento.create', compact('users','dadosPagina','status','orcamento'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $orcamento = Orcamento::create($input);

        for ($i = 0; $i < count($request->allFiles()['arquivos']); $i++ ){

            $file = $request->allFiles()['arquivos'][$i];
            $arquivo = new arquivo();
            $arquivo->path = XXXXXXXXXXXXXXXXXX;
            $arquivo->orcamento = 1;
            $arquivo->visivelCliente = 1;
            $arquivo->orcamento_id = $orcamento->id;
            $arquivo->save();
            unset($arquivo);
        }

    }


    public function show(orcamento $orcamento)
    {
        //
    }


    public function edit(orcamento $orcamento)
    {
        $users = User::all();
        $dadosPagina = [
            'titulo' => 'Edição Orçamento',
            'rotaForm' => route('orcamento.update', $orcamento->id),
            'alert-rodape' => 'alert-success',
            'caminhos' => [
                [
                    'descricao' => 'Orçamentos',
                    'rota' => route('orcamento.index')
                ],
                [
                    'descricao' => $users->find($orcamento->user_id)->name,
                    'rota' => route('user.edit', $orcamento->user_id)
                ],
                [
                    'descricao' => 'Edição',
                    'rota' => '#'
                ],
            ]
        ];

        $listaArquivos = [
            [
                'titulo' => 'Orçamentos',
                'arquivos' => $orcamento->arquivos()->where('orcamento', true)->get()
            ],
            [
                'titulo' => 'Arquivos da Empresa',
                    'arquivos' => $orcamento->arquivos()->where('visivelCliente', false)->get()
            ],
            [
                'titulo' => 'Arquivos Para o Cliente',
                'arquivos' => $orcamento->arquivos()->where('visivelCliente', true)->where('visivelCliente', true)->get()
            ],
            [
                'titulo' => 'Arquivos do Cliente',
                'arquivos' => $orcamento->arquivos()->where('origem', 'Cliente')->get()
            ],
        ];
        $status = Status::all();
        //dd($orcamento->arquivos()->where('orcamento', true)->get());
        $put = true; //Define o método para o formulário, já que o mesmo serve pra update e create

        return view('orcamento.update',compact('orcamento','dadosPagina','users','status','put','listaArquivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orcamento $orcamento)
    {
        $input = $request->all();
        $orcamento->update($input);
        return  redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\orcamento  $orcamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(orcamento $orcamento)
    {
        //
    }
}
