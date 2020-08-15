@extends('adminlte::page')

@section('title', 'Perfiles')

@section('content_header')
    <h1>Larafood <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></h1>
@stop

@section('content')

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>

    </ol>

  


    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <form action="{{ route('profiles.search') }}" method="post" class="form form-inline">
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td><strong>{{ $profile->name }}</strong></td>
                            <td>{{ $profile->description }}</td>
                       
                            
                            <td style="width:1em">
                                {{-- <a   href="{{ route('details.profile.index', $profile->id) }}" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a> --}}
                                <a   href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a   href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
            
    </div>
@stop