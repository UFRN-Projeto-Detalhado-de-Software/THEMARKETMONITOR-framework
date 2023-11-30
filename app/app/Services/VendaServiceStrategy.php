<?php

namespace App\Services;

interface VendaServiceStrategy
{
    public function validate_create(VendaDTO $dados);
    public function validate_update(VendaDTO $dados, $id);
    public function validate_delete($id);

}
