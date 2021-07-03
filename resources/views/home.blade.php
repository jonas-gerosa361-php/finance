@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <section>
        <div class="container-fluid">
            <form action="/home" method="POST">
                @csrf
                <label for="month" class="form-label">Filtrar por mês</label>
                <input type="month"
                    value="<?php if (empty($bills->month)) echo Date('Y-m'); if (!empty($bills->month)) echo $bills->month;?>" 
                    class="form-group"
                    name="month">
                <button type="submit" class="btn btn-primary">
                    Filtrar
                </button>
            </form>
        </div>
    </section>
    <section class="mt-4">
        <h2>
            Despesas
        </h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>
                        Descrição
                    </th>
                    <th>
                        Categoria
                    </th>
                    <th>
                        Valor
                    </th>
                    <th>
                        Vencimento
                    </th>
                    <th>
                        Recorrente
                    </th>
                    <th>
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($bills))
                    @foreach ($bills as $bill)
                        <tr>
                            <td>
                                {{$bill->name}}
                            </td>
                            <td>
                                {{$bill->categories->name}}
                            </td>
                            <td>
                                R$ {{$bill->value}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($bill->due_date)->format('d/m/Y')}}
                            </td>
                            <td>
                                @if (!empty($bill->repeatFor))
                                    {{$bill->repeatedFor}}
                                    /
                                    {{$bill->repeatFor}}
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-row-reverse justify-content-around">
                                    <i onclick="deleteBill('{{$bill->id}}')" title="excluir" class="fas fa-trash-alt danger"></i>
                                    <i onclick="editBill('{{$bill->id}}')" title="editar" class="edit fas fa-edit"></i>
                                    @if ($bill->paid) 
                                        <i title="pagar" onclick="payBill('{{$bill->id}}')" class="success fas fa-check-circle"></i>
                                    @else
                                        <i title="pagar" onclick="payBill('{{$bill->id}}')" class="success-fade fas fa-check-circle"></i>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </section>

    <section class="mt-4">
        <h2>
            Receitas
        </h2>
        <table class="table table-striped">
            <thead class="thead-light">
                <th>
                    Nome
                </th>
                <th>
                    Descrição
                </th>
                <th>
                    Valor
                </th>
                <th>
                    Data
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @if (!empty($incomes))
                    @foreach ($incomes as $income)
                        <tr>
                            <td>
                                {{$income->name}}
                            </td>
                            <td>
                                {{$income->description}}
                            </td>
                            <td>
                                R$ {{$income->value}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($income->date)->format('d/m/Y')}}
                            </td>
                            <td>
                                <div class="d-flex flex-row-reverse justify-content-around">
                                    <i onclick="deleteIncome('{{$income->id}}')" title="excluir" class="fas fa-trash-alt danger"></i>
                                    <i onclick="editIncome('{{$income->id}}')" title="editar" class="edit fas fa-edit"></i>
                                    @if ($income->paid)
                                        <i title="receber" onclick="receiveIncome('{{$income->id}}')" class="success fas fa-check-circle"></i>
                                    @else
                                        <i title="receber" onclick="receiveIncome('{{$income->id}}')"  class="success-fade fas fa-check-circle"></i>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </section>
    <script src="/assets/js/axios.js"></script>
    <script src="/assets/js/home.js"></script>
@endsection