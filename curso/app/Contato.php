<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
      'nome',
      'cliente_id'

    ];

    public function cliente(){
    	return $this->belongsTo('App\cliente');
    }
}
