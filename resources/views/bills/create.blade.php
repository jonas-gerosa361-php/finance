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
                <label for="category" class="form-label">Categoria</label>
                <select name="category" class="form-control">
                    @if (!empty($categories))
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="due_date">Vencimento</label>
                <input required type="date" class="form-control" name="due_date">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="value">Valor</label>
                <input required class="form-control" type="text" id="value" name="value">
            </div>
            
             <div id="creditCardDiv" class="mb-3">
                <label class="form-label" for="creditCard">Cartão de Crédito</label>
                <select name="credit_card" id="creditCard" class="form-control">
                    <option value="">Escolher</option>
                    <option value="Casas Bahia">Casas Bahia</option>
                    <option value="Itaucard">Itaucard</option>
                    <option value="Riachuelo">Riachuelo</option>
                    <option value="Nubank Jonas">Nubank Jonas</option>
                    <option value="Nubank Cal">Nubank Cal</option>
                </select>
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
        <script src="/assets/js/bills/create.js"></script>        
    @endpush
@endsection