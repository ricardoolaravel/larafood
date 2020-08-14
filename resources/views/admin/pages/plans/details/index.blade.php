@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do Plano <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></h1>
@stop

@section('content')

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}" class="link-active">Detalhes</a></li>

    </ol>


    <div class="card">

        @include('admin.includes.alerts')
      
        <div class="card-body">
           <table class="table table-condensed">
               <thead>
                   <th>Nome</th>
                   <th width="200">Ações</th>
               </thead>
               <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td><strong>{{ $detail->name }}</strong></td>
                       
                            <td style="width:1em">
                                <a   href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-dark"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a   href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
            
    </div>
@stop