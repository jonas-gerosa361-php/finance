<?php

namespace App\Http\Controllers;

use App\Services\Accounts\DestroyAccount;
use App\Services\Accounts\GetAccount;
use App\Services\Accounts\ListAccounts;
use App\Services\Accounts\StoreAccount;
use App\Services\Accounts\UpdateAccount;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index(ListAccounts $action)
    {
        $accounts = $action->execute();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request, StoreAccount $action)
    {
        return $action->execute($request->all());
    }

    public function edit(int $id, GetAccount $action)
    {
        $account = $action->execute($id);
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, int $id, UpdateAccount $action)
    {
        $request['id'] = $id;
        return $action->execute($request->all());
    }

    public function destroy(int $id, DestroyAccount $action)
    {
        return $action->execute($id);
    }
}
