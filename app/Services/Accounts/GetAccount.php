<?php

namespace App\Services\Accounts;

use App\Models\Accounts;

class GetAccount
{
    public function execute(int $id)
    {
        return Accounts::find($id);
    }
}
