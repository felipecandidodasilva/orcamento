<?php

namespace App\Http\Controllers;

use App\Model\arquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pathName = "Felipe Cândido";
        if(!Storage::exists($pathName)) {
            Storage::makeDirectory($pathName);
        } else {
            echo "<p>Diretório: $pathName, já criado<p></p> <br><hr>";
        }

        //Storage::deleteDirectory('Cliente A');
        //Storage::delete('File Name');

        $files = Storage::files('');
        $allfiles = Storage::allfiles('');
        $directories = Storage::directories();
        $alldirectories = Storage::alldirectories();

        //Salvando em outro disco

        Storage::disk('local')->put('teste.txt', 'Um teste simples');

        var_dump($allfiles,$directories);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\arquivo  $arquivo
     * @return \Illuminate\Http\Response
     */
    public function show(arquivo $arquivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\arquivo  $arquivo
     * @return \Illuminate\Http\Response
     */
    public function edit(arquivo $arquivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\arquivo  $arquivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, arquivo $arquivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\arquivo  $arquivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(arquivo $arquivo)
    {
        //
    }
}
