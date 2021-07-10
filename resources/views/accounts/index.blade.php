@extends('layouts.master')
@section('header')
    @include('components.header')
@endsection
@section('content')
    <section class="mt-4">
        <h2>
            Contas
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
                        Saldo
                    </th>
                    <th>
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($accounts))
                    @foreach ($accounts as $account)
                        <tr>
                            <td>
                                {{$account->id}}
                            </td>
                            <td>
                                {{$account->name}}
                            </td>
                            <td>
                                {{$account->balance}}
                            </td>
                            <td>
                                <div class="d-flex flex-row-reverse justify-content-around">
                                    <i onclick="deleteAccount('{{$account->id}}')" title="excluir" class="fas fa-trash-alt danger"></i>
                                    <i onclick="editAccount('{{$account->id}}')" title="editar" class="edit fas fa-edit"></i>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="mt-2 d-flex flex-row-reverse">
            <a href="/accounts/create">
                <button type="button"
                    class="btn btn-primary"
                    id="newButton"
                >
                    Nova Conta
                </button>
            </a>
        </div>
    </div>
</div>
    </section>
    <script src="/assets/js/accounts/index.js"></script>
@endsection