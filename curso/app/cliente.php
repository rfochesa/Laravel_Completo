<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = [
      'nome',
      'endereco',
      'numero'

    ];

    public function contatos(){
    	return $this->hasMany('App\Contato');
    }
    
}
