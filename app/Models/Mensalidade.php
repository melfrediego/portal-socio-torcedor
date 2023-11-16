<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $fillable = [
        'numero_mensalidade',
        'pedido_id',
        'charge_id',
        'data_emissao',
        'data_vencimento',
        'data_pegamento',
        'valor_cobrado' ,
        'valor_pago',
        'status'
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function transacao(){
        return $this->Hasmany(Transacao::class);
    }

    public function updateCharge($charge_id, $new_status){
        $this->charge_id = $charge_id;
        $this->save();
    }
}
