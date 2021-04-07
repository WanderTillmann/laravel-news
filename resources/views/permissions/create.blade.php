@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Criar Permissão') }}</div>
            <div class="card-body">
                <form action="{{ route('permission.store') }}" method="post">
                    @csrf
                    @include('permissions._form')
                </form>
            </div>
        </div>
    </div>
@endsection
