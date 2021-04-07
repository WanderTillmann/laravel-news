@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"> {{ __('Editar Permissão') }}</div>
                    <div class="col-6 d-flex justify-content-end">
                        <a href="{{ route('permission.create') }}"
                            class="btn btn-sm btn-primary me-2">{{ __('Add Permissão') }}</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('permission.index') }}">Voltar</a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('permission.update', $permission->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    @include('permissions._form')
                </form>
            </div>
        </div>
    </div>
@endsection
