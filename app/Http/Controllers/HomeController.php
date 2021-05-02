<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Services\StoreBill;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('/create');
    }

    public function store(Request $request, StoreBill $action)
    {
        return $action->execute($request->all());
    }
}
