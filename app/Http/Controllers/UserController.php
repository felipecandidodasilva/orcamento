<?php

namespace App\Http\Controllers;

use App\Model\arquivo;
use App\Model\Orcamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\EnviaAvisoDev;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Model\Conta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

//use Illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lista = User::all();
        $dadosPagina = [
            'titulo' => 'Usuários',
            'form' => 'usuarios.form-create'
        ];
        return view('usuarios.index', compact('lista', 'dadosPagina'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {




        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        $request = $request->all();

        $criado = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);


        $arquivo = new arquivo();

        // DEFINE O NOME DA PASTA, CO O SLUG DO NOME DO CLIENTE MAIS SEU ID,
        // PARA CASO HAJA CLIENTE COM MESMO NOME.
        $criado->pasta = $arquivo->defineCaminho($request['name'] . '-' . $criado->id);
        $criado->update();

        if (!Storage::exists($criado->pasta)) {
            Storage::makeDirectory($criado->pasta);
        }

        if ($criado) {
            //Conta::mensagem('success', 'Usuário Criado!');
            Log::info(auth()->user()->id ." - " . auth()->user()->name . " Criação: " . $usuario->id . " - " . $usuario->name);
            //Mail::to(env('MAIL_DESENV','SUPORTE@COSTACANDIDO.COM.BR'))->send(new EnviaAvisoDev("Novo Usuário Cadastrado."));
        } else {
            Conta::mensagem('danger', 'Erro ao Criar usuário!');
            return redirect(route('user.index'));
        }
        // depois dos dados básicos, vamos ao  cadastro detalhado
        return redirect(route('user.edit', $criado->id));
    }

    public function show($id)
    {
        echo "Metodo show";
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $orcamentos = Orcamento::listaOrcamentoUser($user);

        $dadosPagina = [
            'titulo' => 'Editar Usuário: ' . $user->name,
            'form' => 'usuarios.form-update',
            'rota' => 'user.',
            'rotaAtualNome' => 'Alteração',
            'rotaAnteriorNome' => 'Usuários',
        ];


        return view('usuarios.update', compact('dadosPagina', 'user', 'orcamentos'));
    }

    public function detalhes($id)
    {
        $user = User::findOrFail($id);

        $dadosPagina = [
            'titulo' => 'Mais detalhes',
            'route' => 'user.detalhes'
        ];

        return view('usuarios.detalhes', compact('dadosPagina', 'user'));
    }

    public function update(Request $request, $id)
    {
        // A SENHA SÓ É ALTERADA VIA ESQUECI A SENHA 
        $user = User::findOrFail($id);
        // SE HOUVE TROCA DE EMAIL O SISTEMA VERIFICA SE EXISTE OUTRO IGUAL
        if ($user->email != $request->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $input = $request->all();
        $input['cliente'] = isset($input['cliente']) ? true : false;
        $input['fornecedor'] = isset($input['fornecedor']) ? true : false;
        $input['funcionario'] = isset($input['funcionario']) ? true : false;
        $user->update($input);
        return redirect()->back();
    }

    public function destroy($id)
    {

        //GARANTINDO A NÃO EXCLUSÃO DE USUÁRIOS DE SISTEMA
        if ($id == 1 or $id == 2) {
            dd('Desculpe o usuário de ID 1 e 2, não podem ser removidos, Você pode renomeá-los e mudar sua senha.');
            return redirect()->back();
        }

        if ($id == auth()->user()->id) {
            dd('Desculpe para remover o usuário logado é necessário sair dessa conta e entrar com outra conta!');
            return redirect()->back();
        }

        $usuario = User::findOrFail($id);

        $orcamento = Orcamento::where('user_id', $usuario->id)->get();

        if(count($orcamento) > 0 ) {
            dd('Existem orçamentos para esse usuário, exclua os orçamentos primeiro');
        }
        //Exclui a pasta se houver
        if (Storage::exists($usuario->pasta)) {
            Storage::makeDirectory($usuario->pasta);
        }

        $usuario->delete();
        Log::info(auth()->user()->id ." - " . auth()->user()->name . " Exclusão: " . $usuario->id . " - " . $usuario->name);
        return redirect()->route('user.index');
    }

    public static function parabens()
    {

        $dados = [
            'empresa' => [
                'nome' => 'GM Elétrica'
            ],
            'cliente' => [
                'nome' => 'Felipe Silva'
            ],
        ];

        Mail::send('mail.parabens', $dados, function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to('john@johndoe.com', 'John Doe');
            $message->cc('john@johndoe.com', 'John Doe');
            $message->bcc('john@johndoe.com', 'John Doe');
            $message->replyTo('john@johndoe.com', 'John Doe');
            $message->subject('Subject');
            $message->priority(3);
            $message->attach('pathToFile');
        });
    }
}
