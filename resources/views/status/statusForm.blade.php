<div class="col-xs-12 col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2>Criar Novo Status </h2>
        </div>

        <div class="box-body">

            <form action="{{ route('status.store')  }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group has-feedback {{ $errors->has('description') ? 'has-error' : '' }}">
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}"
                           placeholder="{{ trans('adminlte::adminlte.description') }}" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('description'))
                        <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>

                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >Salvar
                </button>
            </form>
        </div>
    </div>
</div>