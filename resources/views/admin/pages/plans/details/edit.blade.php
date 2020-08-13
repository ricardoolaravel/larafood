@extends('adminlte::page')

@section('title', "Editar detalhes ao plano: {$plan->name}")

@section('content_header')
    <h1> Detalhes de {{ $plan->name }}</h1>
@stop

@section('content')

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.edit', [$plan->url, $idDetail->id]) }}" class="link-active">Editar</a></li>

    </ol>


    <div class="card">
      
        <div class="card-body">

            <form action="{{ route('details.plan.update', [$plan->url, $idDetail->id]) }}" method="post">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>

        </div>
    </div>
      
@stop