<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    public function plano_vantagens(){
        return $this->hasMany(PlanoVantagem::class);
    }
}
