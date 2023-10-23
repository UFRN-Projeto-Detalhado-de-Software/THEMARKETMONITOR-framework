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


    protected $fillable = [
        'nome',
        'dataDeNascimento',
        'email',
        'telefone',
        'cpf',
    ];


    public function acessante(): BelongsToMany
    {
        return $this->belongsToMany(Funcionario::class, 'funcionario_acessos', 'acessado', 'acessante');
    }

    public function acessado(): BelongsToMany
    {
        return $this->belongsToMany(Funcionario::class, 'funcionario_acessos', 'acessante', 'acessado');
    }

    public function metas(): MorphMany
    {
        return $this->morphMany(Meta::class, 'metable');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($funcionario) {
            // Remover a relação de permição de acesso
            $funcionario->acessante()->detach();
            $funcionario->acessado()->detach();
        });
    }
}
