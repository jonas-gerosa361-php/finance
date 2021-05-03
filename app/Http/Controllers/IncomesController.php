<?php

namespace App\Http\Controllers;

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
}
