<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['produto'];

    public function scopeSearch($query, $val)
    {
        return $query
        ->where('produto','like','%'.$val.'%');
    }
}
