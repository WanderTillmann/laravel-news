@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8"> {{ __('Criar Permissão') }}</div>
                    <div class="col-4 d-flex justify-content-end "> <a class="btn btn-primary btn-sm"
                            href="{{ route('permission.index') }}">Voltar</a>
                    </div>
                </div>


            </div>
            <div class="card-body">
                <form action="{{ route('permission.store') }}" method="post">
                    @csrf
                    @include('permissions._form')
                </form>
            </div>
        </div>
    </div>
@endsection
