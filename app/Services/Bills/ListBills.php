<?php

namespace App\Services\Bills;

use App\Models\Bills;
use Carbon\Carbon;

class ListBills
{
    public function execute($monthYear = 0)
    {
        $month = substr($monthYear, -2);
        $date = Carbon::now();
        if ($month == 0) {
            $month = str_pad($date->month, 2, '0', STR_PAD_LEFT);
            $bills = Bills::where('due_date', 'like', "%-$month-%")
                ->with('categories')
                ->orderBy('due_date', 'DESC')
                ->get();
        }

        $bills = Bills::where('due_date', 'like', "%-$month-%")
            ->with('categories')
            ->orderBy('due_date', 'DESC')
            ->get();


        $bills->month = $monthYear;
        $bills->prevision = $this->appendPrevisionColumn($bills);
        $bills->realized = $this->appendRealizedColumn($bills);
        return $bills;
    }

    private function appendPrevisionColumn($bills)
    {
        $response = 0;
        foreach ($bills as $bill) {
            $response += $bill->value;
        }
        
        return $response;
    }

    private function appendRealizedColumn($bills)
    {
        $response = 0;
        foreach ($bills as $bill) {
            if (empty($bill->paid)) {
                continue;
            }

            if ($bill->paid) {
                $response += $bill->value;
            }
        }

        return $response;
    }
}
