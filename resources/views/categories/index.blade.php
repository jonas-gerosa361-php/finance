@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <section class="mt-4">
        <h2>
            Categorias
        </h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nome
                    </th>
                    <th>
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($categories))
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                <div class="d-flex flex-row-reverse justify-content-around">
                                    <i onclick="deleteCategory('{{$category->id}}')" title="excluir" class="fas fa-trash-alt danger"></i>
                                    <i onclick="editCategory('{{$category->id}}')" title="editar" class="edit fas fa-edit"></i>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="mt-2 d-flex flex-row-reverse">
            <a href="/categories/create">
                <button type="button"
                    class="btn btn-primary"
                    id="newButton"
                >
                    Nova Categoria
                </button>
            </a>
        </div>
    </div>
</div>
    </section>
    <script src="/assets/js/categories/index.js"></script>
@endsection