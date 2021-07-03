<?php

namespace App\Http\Controllers;

use App\Services\Bills\DeleteBill;
use App\Services\Bills\GetBill;
use App\Services\Bills\PayBill;
use Illuminate\Http\Request;
use \App\Services\Bills\StoreBill;
use App\Services\Bills\UpdateBill;
use App\Services\Categories\ListCategories;

class BillsController extends Controller
{
    public function create(ListCategories $action)
    {
        $categories = $action->execute();
        return view('bills.create', compact('categories'));
    }

    public function store(Request $request, StoreBill $action)
    {
        return $action->execute($request->all());
    }

    public function payBill(Request $request, PayBill $action)
    {
        return $action->execute($request->get('id'));
    }

    public function edit(int $id, GetBill $action)
    {
        $bill = $action->execute($id);
        return view('bills.edit', compact('bill'));
    }

    public function update(Request $request, int $id, UpdateBill $action)
    {
        $request['id'] = $id;
        return $action->execute($request->all());
    }

    public function delete(int $id, DeleteBill $action)
    {
        return $action->execute($id);
    }
}
