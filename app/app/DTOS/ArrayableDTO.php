<?php

namespace App\DTOS;

trait ArrayableDTO
{

    public function toArray(): array
    {
        return array_filter((array) $this, fn ($value) => $value != null);
    }
}
