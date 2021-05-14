@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <div class="mt-2 row col-md-6">
        <h2>Editar conta #{{$bill->id}}</h2>
        <form autocomplete="off" class="form-group">
            <input hidden value="{{$bill->id}}" id="bill" type="text">
            <div class="mb-3">
                <label class="form-label" for="name">Nome</label>
                <input required type="text" value="{{$bill->name}}" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label" for="due_date">Vencimento</label>
                <input required type="date" value="{{Carbon\Carbon::parse($bill->due_date)->format('Y-m-d')}}" class="form-control" name="due_date">
            </div>
            <div class="mb-3">
                <label class="form-label" for="value">Valor</label>
                <input required class="form-control" value="{{$bill->value}}" type="text" id="value" name="value">
            </div>
            <div class="mb-3">
                <label for="repeat">Repetir transação?</label>
                @if (empty($bill->repeatFor))
                    <input id="repeat" type="checkbox" name="repeat">
                @else 
                    <input checked id="repeat" type="checkbox" name="repeat">
                @endif
            </div>
            @if (empty($bill->repeatFor))
                <div style="display: none" id="hidden" class="mb-3">
            @else
                <div id="hidden" class="mb-3">
            @endif
                <label class="form-label" for="repeat-n-times">Repetir quantas vezes?</label>
                <input class="form-control" value="{{$bill->repeatFor}}" type="number" id="repeatFor" name="repeat-n-times" min="1" max="99">
            </div>
            <div class="d-flex flex-row-reverse">
                <button id="saveButton" class="btn btn-primary">
                    Editar
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script src="/assets/js/axios.js"></script>
        <script src="/assets/js/bills/edit.js"></script>        
    @endpush
@endsection