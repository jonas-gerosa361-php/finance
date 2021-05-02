@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <div class="mt-2 row col-md-6">
        <h2>Cadastrar nova conta</h2>
        <form autocomplete="off" class="form-group">
            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input required type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label" for="due-date">Vencimento</label>
                <input required type="date" class="form-control" name="due-date">
            </div>
            <div class="mb-3">
                <label class="form-label" for="value">Valor</label>
                <input required class="form-control" type="text" name="value">
            </div>
            <div class="mb-3">
                <label for="repeat">Repetir transação?</label>
                <input id="repeat" type="checkbox" name="repeat">
            </div>
            <div style="display: none" id="hidden" class="mb-3">
                <label class="form-label" for="repeat-n-times">Repetir quantas vezes?</label>
                <input class="form-control" type="number" id="repeatFor" name="repeat-n-times" min="1" max="99">
            </div>
            <div class="d-flex flex-row-reverse">
                <button id="saveButton" class="btn btn-primary">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script src="/assets/js/axios.js"></script>
        <script src="/assets/js/create.js"></script>        
    @endpush
@endsection