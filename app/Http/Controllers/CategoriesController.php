<?php

namespace App\Http\Controllers;

use App\Services\Categories\DeleteCategory;
use App\Services\Categories\GetCategory;
use App\Services\Categories\ListCategories;
use App\Services\Categories\StoreCategory;
use App\Services\Categories\UpdateCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(ListCategories $action)
    {
        $categories = $action->execute();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request, StoreCategory $action)
    {
        return $action->execute($request->all());
    }

    public function edit(int $id, GetCategory $action)
    {
        $category = $action->execute($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, int $id, UpdateCategory $action)
    {
        $request['id'] = $id;
        return $action->execute($request->all());
    }

    public function delete(int $id, DeleteCategory $action)
    {
        return $action->execute($id);
    }
}
