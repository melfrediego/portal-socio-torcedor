<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['nome', 'email', 'telefone', 'assunto', 'mensagem', 'mensagem_resposta', 'respondido', 'data_resposta'];
}
