@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Registro do plano<strong>{{ $plan->name }}</strong></h2>
        </div>
        <div class="card-body">
            <ul>

                <li>
                    <strong>Nome: </strong> {{ $plan->name }}
                </li>

                <li>
                    <strong>URL: </strong> {{ $plan->url }}
                </li>

                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ",", ".") }}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $plan->description }}
                </li>

            </ul>
        </div>

        <div class="card-footer">
            @include('admin.includes.alerts')
            <form style="display: inline" action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
               <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
            </form>
            <a style="display: inline" href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Editar</a>
        </div>
    </div>
@endsection