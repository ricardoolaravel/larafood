@extends('adminlte::page')

@section('title', 'Larafood')

@section('content_header')
    <h1>Larafood <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></h1>
@stop

@section('content')

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>

    </ol>


    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
                @csrf
            <input type="text" name="filter" id="" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fa fa-search-plus" aria-hidden="true"></i> Filtar</button>
            </form>
        </div>
        <div class="card-body">
           <table class="table table-condensed">
               <thead>
                   <th>Nome</th>
                   <th>Preço</th>
                   <th width="250">Ações</th>
               </thead>
               <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td><strong>{{ $plan->name }}</strong></td>
                       
                            <td>R$ {{ number_format($plan->price, 2, ",", ".") }}</td>
                            <td style="width:1em">
                                <a   href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                <a   href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a   href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
            
    </div>
@stop