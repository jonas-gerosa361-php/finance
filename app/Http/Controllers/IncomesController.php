<?php

namespace App\Http\Controllers;

use App\Services\Incomes\DeleteIncome;
use App\Services\Incomes\GetIncome;
use App\Services\Incomes\ReceiveIncome;
use Illuminate\Http\Request;
use App\Services\Incomes\StoreIncome;
use App\Services\Incomes\UpdateIncome;

class IncomesController extends Controller
{
    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request, StoreIncome $action)
    {
        return $action->execute($request->all());
    }

    public function receiveIncome(Request $request, receiveIncome $action)
    {
        return $action->execute($request->get('id'));
    }

    public function edit(int $id, GetIncome $action)
    {
        $income = $action->execute($id);
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, int $id, UpdateIncome $action)
    {
        $request['id'] = $id;
        return $action->execute($request->all());
    }

    public function delete(int $id, DeleteIncome $action)
    {
        return $action->execute($id);
    }
}
