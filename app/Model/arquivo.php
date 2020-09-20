<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class arquivo extends Model
{
    public $pastaBase = 'Orcamentos';

    public function getPastaBase(){
        return $this->pastaBase;
    }

    public function defineCaminho($pasta){
        $this->existePastaBase();
        return $this->pastaBase . DIRECTORY_SEPARATOR . Str::slug($pasta);
    }

    public function existePastaBase()
    {
        return Storage::exists($this->pastaBase) ? true : Storage::makeDirectory($this->pastaBase);
    }

    public function orcamento()
    {
        return $this->belongsTo(Orcamento::class);
    }
}
