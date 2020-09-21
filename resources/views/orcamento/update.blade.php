@extends('adminlte::page')

@section('title', $dadosPagina['titulo'])

@section('content_header')
    @include('includes.headerPages')

@stop
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- /.box-header -->
                @include('orcamento.formOrcamento')
                <div class="box-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($listaArquivos as $lista)
        <div class="col-xs-6 col-md-3">
            <div class="box box-primary">
                <div class="box-header">
                    <h3>{{$lista['titulo']}}</h3>
                </div>
                <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        @foreach($lista['arquivos'] as $arquivo)
                            <tr>
                                <td>{{$arquivo->created_at}}</td>
                                <td>{{$arquivo->path}}</td>
                                <td>Baixar</td>
                                <td>Excluir</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>

    <!-- /.content-wrapper -->
@stop


