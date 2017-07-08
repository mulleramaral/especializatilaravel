@extends('painel.templates.template1')

@section('content')

    @if(isset($errors) && count($errors) > 0)
        <div class="alert-danger alert">
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
        </div>
    @endif

    <form class="form" action="/produto" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="nome" placeholder="Insira o nome" class="form-control">
        </div>

        <div class="form-group">
            <input type="text" name="codigo" placeholder="Insira o codigo" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </form>
@endsection
