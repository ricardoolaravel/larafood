@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Larafood <a href="{{ route('permissions.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></h1>
@stop

@section('content')

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>

    </ol>

  


    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <form action="" method="post" class="form form-inline">
                @csrf
            <input type="text" name="filter" id="" placeholder="Pesquisar.." class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fa fa-search-plus" aria-hidden="true"></i> Filtar</button>
            </form>
        </div>
        <div class="card-body">
           <table class="table table-condensed">
               <thead>
                   <th>Nome</th>
                   <th>Descrição</th>
                   <th width="250">Ações</th>
               </thead>
               <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td><strong>{{ $permission->name }}</strong></td>
                            <td>{{ $permission->description }}</td>
                       
                            
                            <td style="width:1em">
                                {{-- <a   href="{{ route('details.permission.index', $permission->id) }}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a> --}}
                                <a   href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a   href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
            
    </div>
@stop