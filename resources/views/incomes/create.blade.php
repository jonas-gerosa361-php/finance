@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <div class="mt-2 row col-md-6">
        <h2>Cadastrar nova receita</h2>
        <form autocomplete="off" class="form-group">
            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input required type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input required type="text" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="value">Valor</label>
                <input required class="form-control" type="text" id="value" name="value">
            </div>
            <div class="mb-3">
                <label class="form-label" for="due_date">Data</label>
                <input required type="date" class="form-control" name="date">
            </div>
            <div class="d-flex flex-row-reverse">
                <button id="saveButton" class="btn btn-primary">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script src="/assets/js/incomes/create.js"></script>        
    @endpush
@endsection