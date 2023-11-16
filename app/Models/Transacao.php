<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $table = 'transacoes';
    
    protected $fillable = [
        'charge_id',
        'status',
        'payment_method',
        'banking_billet_barcode',
        'banking_billet_link',
        'banking_billet_link_pdf',
        'banking_billet_expire_at',
        'socio_id',
        'mensalidade_id'
    ];
}
