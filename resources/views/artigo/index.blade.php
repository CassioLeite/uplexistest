@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Exibindo resultados para <strong>{{ $data }}</strong></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ action('ArtigosController@store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                        <input type="hidden" name="posts" value="{{ json_encode($posts) }}">
                        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">   
                        @foreach($posts as $post)
                            <p>{{$post['title']}}<p>
                            <p>{{$post['link']}}<p>
                            <hr>
                        @endforeach
                        </div>
                        <a href="{{ URL::previous() }}" class="btn btn-outline-success">Voltar</a>
                        @if(count($posts) > 0)
                          <button id="btn-save" type="submit" class="btn btn-outline-success">Salvar</button>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

