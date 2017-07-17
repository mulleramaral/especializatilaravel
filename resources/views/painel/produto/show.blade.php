@extends('painel.templates.template1')

@section('content')

    <div class="top-header">
        <h1 class="titulo">
            {{$produto->nome}}
        </h1>

        <div>
            <a class="btn btn-success" href="{{url('/produto')}}">
                <i class="glyphicon glyphicon-backward"></i>
            </a>
        </div>
    </div>

    <div>
        <b>Codigo:</b> {{$produto->codigo}} <br>
        <b>Nome:</b> {{$produto->nome}} <br>
    </div>

    <form class="form" method="post" action="/produto/{{$produto->id}}">
        {!! csrf_field() !!}
        {{method_field('DELETE')}}

        <div class="form-group">
            <input type="submit" value="Deletar" class="btn btn-danger">
        </div>
    </form>
@endsection
