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
                    <th>
                        Descrição
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
                        Paga
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
                            <td class="text-center">
                                @if ($bill->paid) 
                                    <input title="pagar" 
                                        onclick="payBill('{{$bill->id}}')"
                                        checked 
                                        type="checkbox"
                                        name="paid"
                                        id="paid"
                                    >
                                @else 
                                    <input title="pagar"
                                        onclick="payBill('{{$bill->id}}')"
                                        type="checkbox"
                                        name="paid"
                                        id="paid"
                                    >
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-row-reverse justify-content-around">
                                    <i onclick="deleteBill('{{$bill->id}}')" title="excluir" class="fas fa-trash-alt danger"></i>
                                    <i onclick="editBill('{{$bill->id}}')" title="editar" class="edit fas fa-edit"></i>
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
                    Recebido
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
                            <td class="text-center">
                                @if ($income->paid)
                                    <input onclick="receiveIncome('{{$income->id}}')" checked type="checkbox" name="received" id="received">
                                @else
                                    <input onclick="receiveIncome('{{$income->id}}')" type="checkbox" name="received" id="received">
                                @endif
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