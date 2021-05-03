<?php

namespace App\Services\Incomes;

use App\Models\Incomes;

class ListIncomes
{
    public function execute()
    {
        return Incomes::all();
    }
}
