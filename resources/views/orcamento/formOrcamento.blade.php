<form role="form" action=" {{ $dadosPagina['rotaForm']}}" method="post" enctype="multipart/form-data">
    @csrf
    @isset($put)
        @method('PUT')
    @endisset
    <div class="form-row">
        <div class="form-group col-md-4 col-lg-3">
            <label for="user_id">Pessoa</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{$user->id}}" {{$orcamento->user_id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-5 col-lg-3">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" value="{{ $orcamento->title }}" id="title" name="title">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3 col-lg-3">
            <label for="value">Valor</label>
            <input type="number" step=".01" class="form-control" value="{{ $orcamento->value }}" id="value"
                   name="value">
        </div>
        <div class="form-group col-md-4 col-lg-3">
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
            <textarea name="description" id="description" rows=10
                      class="form-control">{{ $orcamento->description }}</textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="arquivos">Arquivos:</label>
            <input type="file" name="arquivos[]" id="arquivos" multiple>
        </div>
         <div class="form-group col-md-3">
            <label for="status_id">Orçamento</label>
            <select name="status_id" id="status_id" class="form-control">
                    <option value=1>SIM</option>
                    <option value=0>NÃO</option>
            </select>
        </div>
            <div class="form-group col-md-3">
            <label for="status_id">Visível ao Cliente</label>
            <select name="status_id" id="status_id" class="form-control">
                    <option value=1>SIM</option>
                    <option value=0>NÃO</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="submit" class="btn btn-primary" value="SALVAR">
        </div>
    </div>
</form>