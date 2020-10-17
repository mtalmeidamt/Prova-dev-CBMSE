<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';

    public function contato(){
        return $this->hasMany(Contato::class,'pessoa_id','id');
    }
}
