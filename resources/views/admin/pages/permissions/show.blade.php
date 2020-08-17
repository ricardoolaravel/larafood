@extends('adminlte::page')

@section('title', "Detalhes do plano {$profile->name}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Perfil: <strong>{{ $profile->name }}</strong></h2>
        </div>
        <div class="card-body">
            <ul>

                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $profile->description }}
                </li>

            </ul>
        </div>

        <div class="card-footer">
            @include('admin.includes.alerts')
            <form style="display: inline" action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
               <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
            </form>
            <a style="display: inline" href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Editar</a>
        </div>
    </div>
@endsection