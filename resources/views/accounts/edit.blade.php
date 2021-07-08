@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <div class="mt-2 row col-md-6">
        <h2>Editar Conta {{$account->id}}</h2>
        <form autocomplete="off" class="mt-2 form-group">
            @csrf
            <input type="hidden" name="id" value={{$account->id}}>
            <div class="form-group">
                <label class="form-label" for="name">Nome</label>
                <input id="name"
                    type="text"
                    class="form-control"
                    name="name"
                    value="{{$account->name}}"
                >
            </div>
            <div class="form-group">
                <label for="balance" class="form-label">Saldo</label>
                <input id="balance"
                    type="text"
                    class="form-control"
                    name="balance"
                    value="{{$account->balance}}"
                >
            </div>
            <div class="d-flex flex-row-reverse">
                <button id="saveButton" class="btn btn-primary">
                    Editar
                </button>
            </div>
        </form>
    </div>
    <script src="/assets/js/accounts/edit.js"></script>
@endsection