@extends('painel.templates.template1')

@section('content')

    <div class="top-header">
        <h1 class="titulo">
            Listagem dos produtos
        </h1>

        <div>
            <a class="btn btn-success" href="{{url('/produto/create')}}">
                <i class="glyphicon glyphicon-plus"></i>Cadastrar
            </a>
        </div>
    </div>

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
                <a href="{{url("/produto/{$produto->id}/edit")}}" class="edit"><i class="edit glyphicon glyphicon-pencil"></i></a> |
                <a href="{{url("/produto/{$produto->id}")}}" class="delete"><i class="glyphicon glyphicon-info-sign"></i></a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="3">Nenhum registro cadastrado</td>
            </tr>
        @endforelse
    </table>

    {!! $produtos->links() !!}
@endsection