<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table ='status';
    protected $fillable = ['description'];
}
