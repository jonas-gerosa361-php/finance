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
                <label class="form-label" for="account">Conta</label>
                <select id="accountId" class="form-control" name="account">
                    @foreach ($accounts as $account)
                        <option value="{{$account->id}}">{{$account->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex flex-row-reverse">
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