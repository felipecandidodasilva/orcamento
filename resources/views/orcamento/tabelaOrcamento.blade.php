<div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <th>Data</th>
                <th>Referência</th>
                <th>Pessoa</th>
                <th>Título</th>
                <th>Status</th>
                <th>Opções</th>
              </thead>
              <tbody>
              @foreach($orcamentos as $orc)
                <tr>
                  <td>{{date('d/m/Y', strtotime($orc->created_at))}}</td>
                  <td>{{$orc->id}}</td>
                  <td>{{$orc->user}}</td>
                  <td>{{$orc->title}}</td>
                  <td>{{$orc->status}}</td>
                  <td><a href="{{ route('orcamento.edit', $orc->id)}}" class="btn btn-warning btn-xs pull-right"> <i class="fa fa-edit"></i></a></td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
              {{ $orcamentos->links() }}
              </tfoot>
            </table>
          </div>