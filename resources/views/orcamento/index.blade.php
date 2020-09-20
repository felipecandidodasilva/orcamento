@extends('adminlte::page')

@section('title', $dadosPagina['titulo'])

@section('content_header')
@include('includes.headerPages')
            
@stop
@section('content')
       
  <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          @include('orcamento.tabelaOrcamento');
        </div> <!-- box box-primary -->
      </div>
  </div>
    
@stop


