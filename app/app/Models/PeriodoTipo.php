<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoTipo extends Model
{
    use HasFactory;

    protected $table = 'periodo_tipos';

    public function periodos() : HasMany
    {
        return $this->hasMany(Periodo::class, 'tipo', 'id');
    }
}
