<?php

namespace App\Services\Accounts;

use App\Models\Accounts;
use Illuminate\Database\Eloquent\Collection;

class ListAccounts
{
    public function execute(): Collection
    {
        return Accounts::all();
    }
}
