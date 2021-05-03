<?php

namespace App\Services\Bills;

use App\Models\Bills;

class ListBills
{
    public function execute()
    {
        return Bills::all();
    }
}
