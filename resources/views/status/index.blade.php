@extends('adminlte::page')

@section('title', $dadosPagina['titulo'])

@section('content_header')
    @include('includes.headerPages')
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2>Lista </h2>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($stat as $S)

                            <tr>
                                <td>{{ $S->id }}</td>
                                <td>{{ $S->description}}</a></td>
                                <td>
                                    <a href="{{ route('status.edit', $S->id)}}"
                                       class="btn btn-warning btn-xs pull-right"> <i class="fa fa-edit"></i></a>
                                    <form action="{{ route('status.destroy', $S->id)}}"
                                          method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include($dadosPagina['form'])
    </div>
@stop