@extends('adminlte::page')

@section('title', 'Cadastar Novo Plano')

@section('content_header')
    <h1>Cadastre seu Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.plans._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
@stop