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
            $incomes = Incomes::where('date', 'like', "%-$month-%")
                ->orderBy('date', 'DESC')
                ->get();
        }

        $incomes = Incomes::where('date', 'like', "%-$month-%")
            ->orderBy('date', 'DESC')
            ->get();

        $incomes->prevision = $this->appendPrevisionColumn($incomes);
        $incomes->realized = $this->appendRealizedColumn($incomes);
        return $incomes;
    }

    private function appendPrevisionColumn($incomes)
    {
        $response = 0;
        foreach ($incomes as $income) {
            $response += $income->value;
        }
        
        return $response;
    }

    private function appendRealizedColumn($incomes)
    {
        $response = 0;
        foreach ($incomes as $income) {
            if (empty($income->paid)) {
                continue;
            }

            if ($income->paid) {
                $response += $income->value;
            }
        }

        return $response;
    }
}
