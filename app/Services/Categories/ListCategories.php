<?php

namespace App\Services\Categories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Collection;

class ListCategories
{
    public function execute(): Collection
    {
        return Categories::all();
    }
}
