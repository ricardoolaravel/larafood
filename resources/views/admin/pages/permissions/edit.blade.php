@extends('adminlte::page')

@section('title', "Editar {$permission->name}")

@section('content_header')
    <h1>Editando {{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.permissions._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Editar</button>
                </div>

            </form>
        </div>
    </div>
@stop