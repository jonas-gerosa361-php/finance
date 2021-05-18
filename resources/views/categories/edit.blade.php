@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <div class="mt-2 row col-md-6">
        <h2>Editar categoria #{{$category->id}}</h2>
        <form autocomplete="off" class="mt-2 form-group">
            <input type="hidden" id="id" value="{{$category->id}}">
            <label class="form-label" for="name">Nome</label>
            <input id="name" value="{{$category->name}}" type="text" class="form-control" name="name">
            <div class="d-flex flex-row-reverse">
                <button id="saveButton" class="btn btn-primary">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
    <script src="/assets/js/categories/edit.js"></script>
@endsection