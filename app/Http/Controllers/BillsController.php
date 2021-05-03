<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Services\StoreBill;

class BillsController extends Controller
{
    public function create()
    {
        return view('bills.create');
    }

    public function store(Request $request, StoreBill $action)
    {
        return $action->execute($request->all());
    }
}
