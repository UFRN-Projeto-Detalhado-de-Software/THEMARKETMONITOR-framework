<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Meta extends Model
{
    use HasFactory;

    protected $table = 'metas';

    public function periodo(): MorphOne
    {
        return $this->morphOne(Periodo::class, 'periodable');
    }

    public function metable() : MorphTo
    {
        return $this->morphTo();
    }

//    public function responsavel_meta() : MorphTo
//    {
//        return $this->morphTo();
//    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($meta) {
            $periodo = Periodo::find($meta->periodo);
            $periodo->delete();
        });
    }

}
