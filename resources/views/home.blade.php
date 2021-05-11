@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <section>
        <h2>
            Despesas
        </h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Vencimento</th>
                    <th>
                        Recorrente
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
                                {{$bill->value}}
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
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data</th>
                </tr>
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
                                {{$income->value}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($income->date)->format('d/m/Y')}}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </section>
@endsection