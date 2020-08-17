@extends('adminlte::page')

@section('title', 'Nova Permissão')

@section('content_header')
    <h1>Cadastro de Pemissões</h1>
@stop

@include('admin.includes.alerts')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.permissions._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
@stop