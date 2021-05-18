<?php

namespace App\Services\Incomes;

use App\Models\Incomes;

class GetIncome
{
    public function execute(int $id): Incomes
    {
        return Incomes::find($id);
    }
}
