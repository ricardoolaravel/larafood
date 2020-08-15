@extends('adminlte::page')

@section('title', 'Cadastar Novo Perfil')

@section('content_header')
    <h1>Cadastro de Perfil</h1>
@stop

@include('admin.includes.alerts')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.profiles._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
@stop