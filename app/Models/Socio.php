<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Socio extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'matricula',
        'data_nascimento',
        'foto',
        'sexo',
        'estado_civil',
        'email',
        'senha',
        'local_retirada_kit',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'estado',
        'cidade',
        'leu_contrato',
        'ativo',
        'plano_id'
    ];

    public function planos(){
        return $this->hasMany('App\Models\Plano');
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function pedido(){
        return $this->hasOne(Pedido::class);
    }

}
