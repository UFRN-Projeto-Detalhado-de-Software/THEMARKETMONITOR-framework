<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    use HasFactory;

    public function acessante(): BelongsToMany
    {
        return $this->belongsToMany(Funcionario::class, 'funcionario_acessos', 'acessado', 'acessante');
    }

    public function acessado(): BelongsToMany
    {
        return $this->belongsToMany(Funcionario::class, 'funcionario_acessos', 'acessante', 'acessado');
    }

    public function metable(): MorphMany
    {
        return $this->morphMany(Meta::class, 'metable');
    }
}
