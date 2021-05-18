<?php

namespace App\Services\Categories;

use App\Models\Bills;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Collection;

class GetCategory
{
    public function execute(int $id): Categories
    {
        return Categories::find($id);
    }
}
