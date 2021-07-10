@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <div class="mt-2 row col-md-6">
        <h2>Pagar conta #{{$bill->id}}</h2>
        <form autocomplete="off" class="mt-2 form-group">
            @csrf
            <input hidden
                value="{{$bill->id}}"
                id="billId"
                type="text"
            >

            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input readonly
                    type="text"
                    value="{{$bill->name}}"
                    class="form-control"
                    name="name"
                >
            </div>
            <div class="mb-3">
                <label class="form-label" for="due_date">Vencimento</label>
                <input readonly 
                    type="date"
                    value="{{Carbon\Carbon::parse($bill->due_date)->format('Y-m-d')}}"
                    class="form-control"
                    name="due_date"
                >
            </div>

            <div class="mb-3">
                <label class="form-label" for="value">Valor</label>
                <input readonly
                    class="form-control"
                    value="{{$bill->value}}"
                    type="text"
                    id="value"
                    name="value"
                >
            </div>

            <div class="mb-3">
                <label class="form-label" for="account">Conta *</label>
                <select id="accountId" class="form-control" name="account">
                    @foreach ($accounts as $account)
                        <option value="{{$account->id}}">{{$account->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="pay_date">Data do Pagamento *</label>
                <input class="form-control"
                    type="date"
                    @if ($bill->paid)
                        value="{{Carbon\Carbon::parse($bill->pay_date)->format('Y-m-d')}}"
                    @endif
                    name="pay_date"
                    id="pay_date">
            </div>

            <div id="creditCardDiv" class="mb-3">
                <label class="form-label" for="creditCard">Cartão de Crédito</label>
                <select name="creditCard" id="creditCard" class="form-control">
                    @if (!empty($bill->credit_card))
                        <option selected value="{{$bill->credit_card}}">{{$bill->credit_card}}</option>
                    @else
                        <option value="">Escolher</option>
                        <option value="Casas Bahia">Casas Bahia</option>
                        <option value="Itaucard">Itaucard</option>
                        <option value="Riachuelo">Riachuelo</option>
                        <option value="Nubank Jonas">Nubank Jonas</option>
                        <option value="Nubank Cal">Nubank Cal</option>
                    @endif
                </select>
            </div>

            <div class="mt-2 d-flex flex-row-reverse">
                <button id="saveButton" class="btn btn-primary">
                    Pagar
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script src="/assets/js/axios.js"></script>
        <script src="/assets/js/bills/pay.js"></script>        
    @endpush
@endsection