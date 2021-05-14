<?php

namespace App\Services\Bills;

use App\Models\Bills;

class GetBill
{
    public function execute(int $id): ?Bills
    {
        try {
            return Bills::find($id);
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }
}
