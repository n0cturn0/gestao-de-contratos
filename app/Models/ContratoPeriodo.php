<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoPeriodo extends Model
{

    protected $fillable =
        [
            'idsituacao',
            'idvendedor',
            'datainicial',
            'datainicial',
            'datafinal',
            'datareajuste',
            'qtdparcela',
            'diavencimento',
            'valormensalidade'
        ];
}
