@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bem vindo! Pesquise o conteúdo UpLexis!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ action('ArtigosController@index') }}" method="get">
                        <div class="form-group">
                            <label for="text">Digite algo: </label>
                            <input type="text" name="text" class="form-control" id="text" placeholder="Pesquisar">
                        </div>
                        <button id="btn-search" type="submit" class="btn btn-outline-success">Pesquisar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
