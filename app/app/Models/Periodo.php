<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos';

    public function tipo() : BelongsTo
    {
        return $this->belongsTo(PeriodoTipo::class, 'tipo', 'id');
    }

}
