@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Editar Permissão') }}</div>
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
