<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Bills\ListBills;
use App\Services\Incomes\ListIncomes;

class HomeController extends Controller
{
    public function index(Request $request, ListBills $listBillsAction, ListIncomes $listIncomesAction)
    {
        if (!empty($request->get('month'))) {
            $bills = $listBillsAction->execute($request->get('month'));
            $incomes = $listIncomesAction->execute($request->get('month'));
            return view('home', compact('bills', 'incomes'));
        }


        $bills = $listBillsAction->execute();
        $incomes = $listIncomesAction->execute();
        return view('home', compact('bills', 'incomes'));
    }
}
