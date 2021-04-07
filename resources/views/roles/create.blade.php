@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Criar Cargo') }}</div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    @include('permissions._form')
                </form>
            </div>
        </div>
    </div>
@endsection
