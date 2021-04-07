@extends('layouts.app')


@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"> {{ __('Editar Cargo') }}</div>
                    <div class="col-6 d-flex justify-content-end">
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('role.update', $role->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    @include('roles._form')
                </form>
            </div>
        </div>
    </div>
@endsection
