<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orcamento extends Model
{
    protected $fillable = ['title','description','value','status_id', 'user_id'];

    public function user(){
        $this->belongsTo(User::class);
    }

    static function listaOrcamento(int $paginate = 10){
         return DB::table('orcamentos')
            ->join('users', 'orcamentos.user_id','=','users.id')
            ->join('status', 'orcamentos.status_id','=','status.id')
            ->select('orcamentos.*','users.name as user','status.description as status')
            ->orderBy('orcamentos.id', 'DESC')
            ->paginate($paginate);
    }

     static function listaOrcamentoUser(User $user,int $paginate = 10){
         return DB::table('orcamentos')
            ->join('users', 'orcamentos.user_id','=','users.id')
            ->join('status', 'orcamentos.status_id','=','status.id')
            ->select('orcamentos.*','users.name as user','status.description as status')
             ->where('user_id',$user->id)
            ->orderBy('orcamentos.id', 'DESC')
            ->paginate($paginate);
    }

    public function status(){
        $this->hasMany(status::class);
    }

    public function arquivos()
    {
       return $this->hasMany(arquivo::class);
    }
}
