@extends('adminlte::page')

@section('title', "Mostrado: {$detail->name}")

@section('content_header')
    <h1> Mostrando {{ $detail->name }}</h1>
@stop

@section('content')

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="link-active">Mostrando</a></li>

    </ol>


    <div class="card">
      
        <div class="card-body">

         <p><strong>{{ $detail->name }}</strong></p>

        </div>
    </div>

    <div class="card-footer">
        <form style="display: inline" action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="POST">
            @csrf
            @method('DELETE')
           <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
        </form>
        <a style="display: inline" href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-warning"><i class="fa fa-reply" aria-hidden="true"></i> Editar</a>
    </div>
    </div>
      
@stop