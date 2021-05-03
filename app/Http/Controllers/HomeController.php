<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Bills\ListBills;
use App\Services\Incomes\ListIncomes;

class HomeController extends Controller
{
    public function index()
    {
        $action = new ListBills();
        $bills = $action->execute();
        $action = new ListIncomes();
        $incomes = $action->execute();
        return view('home', compact('bills', 'incomes'));
    }
}
