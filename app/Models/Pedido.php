<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'socio_id',
        'plano_id',
        'forma_pagamento',
        'valor_parcela',
        'valor_total',
        'qtd_parcela',
        'desconto'
    ];

    public function socio(){
        return $this->belongsTo(Socio::class);
    }

    public function plano(){
        return $this->belongsTo(Plano::class);
    }

    public function mensalidades(){
        return $this->hasMany(Mensalidade::class);
    }
}
