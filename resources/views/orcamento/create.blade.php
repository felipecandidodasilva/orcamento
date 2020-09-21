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

    <!-- /.content-wrapper -->
@stop


