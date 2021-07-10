<?php

namespace App\Http\Controllers;

use App\Services\Accounts\ListAccounts;
use App\Services\Bills\ListBills;
use App\Services\Incomes\ListIncomes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(
        Request $request,
        ListBills $listBillsAction,
        ListIncomes $listIncomesAction,
        ListAccounts $listAccountsAction
    ) {
        $accounts = $listAccountsAction->execute();
        if (!empty($request->get('month'))) {
            $bills = $listBillsAction->execute($request->get('month'));
            $incomes = $listIncomesAction->execute($request->get('month'));
            return view('home', compact('bills', 'incomes', 'accounts'));
        }

        $bills = $listBillsAction->execute();
        $incomes = $listIncomesAction->execute();
        return view('home', compact('bills', 'incomes', 'accounts'));
    }
}
