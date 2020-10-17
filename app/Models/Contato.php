<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';

    public function tipoContato(){
        return $this->belongsTo(TipoContato::class,'tipos_contatos_id','id');
    }
}
