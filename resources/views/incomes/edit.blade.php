@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <div class="mt-2 row col-md-6">
        <h2>Editar receita #{{$income->id}}</h2>
        <form autocomplete="off" class="form-group">
            <input hidden 
                type="text"
                value="{{$income->id}}"
                id="income"
            >
            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input required 
                    type="text"
                    value="{{$income->name}}"
                    class="form-control"
                    name="name"
                >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <input required
                    type="text"
                    value="{{$income->description}}"
                    name="description"
                    class="form-control"
                >
            </div>
            <div class="mb-3">
                <label class="form-label" for="value">Valor</label>
                <input required
                    class="form-control"
                    type="text"
                    value="{{$income->value}}"
                    id="value" 
                    name="value"
                >
            </div>
            <div class="mb-3">
                <label class="form-label" for="due_date">Data</label>
                <input required
                    type="date"
                    value="{{Carbon\Carbon::parse($income->due_date)->format('Y-m-d')}}"
                    class="form-control"
                    name="date"
                >
            </div>
            <div class="d-flex flex-row-reverse">
                <button id="saveButton" class="btn btn-primary">
                    Editar
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script src="/assets/js/incomes/edit.js"></script>        
    @endpush
@endsection