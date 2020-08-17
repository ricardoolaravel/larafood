@extends('adminlte::page')

@section('title', "Editar {$profile->name}")

@section('content_header')
    <h1>Editando {{ $profile->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.profiles._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Editar</button>
                </div>

            </form>
        </div>
    </div>
@stop