<?php

namespace App\Http\Controllers;

use App\Services\Incomes\ReceiveIncome;
use Illuminate\Http\Request;
use App\Services\Incomes\StoreIncome;

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
}
