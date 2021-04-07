@extends('layouts.app')


@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Editar Cargo') }}</div>
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
