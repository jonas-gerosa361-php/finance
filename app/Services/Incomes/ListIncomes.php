<?php

namespace App\Services\Incomes;

use App\Models\Incomes;
use Carbon\Carbon;

class ListIncomes
{
    public function execute($monthYear = 0)
    {
        $month = substr($monthYear, -2);
        $date = Carbon::now();
        if ($month == 0) {
            $month = str_pad($date->month, 2, '0', STR_PAD_LEFT);
            return Incomes::where('date', 'like', "%-$month-%")
                ->orderBy('date', 'DESC')
                ->get();
        }

        return Incomes::where('date', 'like', "%-$month-%")
            ->orderBy('date', 'DESC')
            ->get();
    }
}
