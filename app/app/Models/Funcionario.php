<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Funcionario extends Model
{

    use HasFactory;

    protected $table = 'funcionarios';

    public function acessante(): BelongsToMany
    {
        return $this->belongsToMany(Funcionario::class, 'funcionario_acessos', 'acessado', 'acessante');
    }

    public function acessado(): BelongsToMany
    {
        return $this->belongsToMany(Funcionario::class, 'funcionario_acessos', 'acessante', 'acessado');
    }
}
