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
                <!-- form start -->
                  <form role="form" action=" {{ $dadosPagina['rotaForm']}}" method="post" enctype="multipart/form-data">
                    @csrf
                      @method('PUT')
                        <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="user_id">Pessoa</label>
                              <select name="user_id" id="user_id" class="form-control">
                                 @foreach ($users as $user)
                                  <option value="{{$user->id}}" {{$orcamento->user_id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                 @endforeach
                              </select>
                            </div>
                          <div class="form-group col-md-5">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" value="{{ $orcamento->title }}" id="title" name="title">
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="value">Valor</label>
                                <input type="number" step=".01" class="form-control" value="{{ $orcamento->value }}"  id="value" name="value">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="status_id">Status</label>
                              <select name="status_id" id="status_id" class="form-control">
                                 @foreach ($status as $s)
                                  <option value="{{$s->id}}" {{$orcamento->status_id == $s->id ? 'selected' : '' }}>{{$s->description}}</option>
                                 @endforeach
                              </select>
                            </div>
                      
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="descricao">Descrição:</label>
                              <textarea name="description" id="description" rows=10 class="form-control">{{ $orcamento->description }}</textarea>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="arquivos">Arquivos:</label>
                              <input type="file" name="arquivos[]" id="arquivos" multiple>
                          </div>
                        </div>
                        
                        <div class="form-row">
                                <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-primary" value="SALVAR">
                                </div>
                            </div>
                  <div class="box-footer">
                  </div>
                </form>
              </div>
              </div>
          </div>
    
        <!-- /.content-wrapper -->
@stop


