<?php

namespace App\Http\Controllers;

use App\Services\Accounts\ListAccounts;
use App\Services\Incomes\DeleteIncome;
use App\Services\Incomes\GetIncome;
use App\Services\Incomes\ReceiveIncome;
use App\Services\Incomes\StoreIncome;
use App\Services\Incomes\UpdateIncome;
use Illuminate\Http\Request;

class IncomesController extends Controller
{
    public function create(ListAccounts $action)
    {
        $accounts = $action->execute();
        return view('incomes.create', compact('accounts'));
    }

    public function store(Request $request, StoreIncome $action)
    {
        return $action->execute($request->all());
    }

    public function receiveIncome(Request $request, receiveIncome $action)
    {
        return $action->execute($request->get('id'));
    }

    public function edit(int $id, GetIncome $action, ListAccounts $listAccountsAction)
    {
        $income = $action->execute($id);
        $accounts = $listAccountsAction->execute();
        return view('incomes.edit', compact('income', 'accounts'));
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
