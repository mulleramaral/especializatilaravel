@extends('painel.templates.template1')

@section('content')
    Listagem dos produtos

    <table class="table table-striped">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th width="150px">Ações</th>
        </tr>

        @forelse($produtos as $produto)
        <tr>
            <td>{{$produto->codigo}}</td>
            <td>{{$produto->nome}}</td>
            <td>
                <a href="">Editar</a> |
                <a href="">Deletar</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3">Nenhum registro cadastrado</td>
            </tr>
        @endforelse
    </table>

@endsection