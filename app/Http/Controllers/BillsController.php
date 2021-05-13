<?php

namespace App\Http\Controllers;

use App\Services\Bills\DeleteBill;
use App\Services\Bills\PayBill;
use Illuminate\Http\Request;
use \App\Services\Bills\StoreBill;

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

    public function payBill(Request $request, PayBill $action)
    {
        return $action->execute($request->get('id'));
    }

    public function edit()
    {
        //TODO:
    }

    public function delete(int $id, DeleteBill $action)
    {
        return $action->execute($id);
    }
}
