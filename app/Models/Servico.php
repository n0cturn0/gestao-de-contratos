<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $fillable = ['servico', 'tipo'];
    protected $attributes = [
        'tipo' => 1,
    ];

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('servico','like','%'.$val.'%');
    }
}
