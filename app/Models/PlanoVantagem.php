<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanoVantagem extends Model
{

    protected $table = 'plano_vantagens';

    public function plano(){
        return $this->belongsTo(Plano::class);
    }
}
