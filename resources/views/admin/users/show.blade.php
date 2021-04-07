@extends('layouts.app')

@section('content')
    <div class="col-md-8 float-right d-flex  justify-content-center">
        <div class="card">
            <div class=" card-header">
                Usuário
            </div>
            <div class="card-body  align-items-center">
                <div class="d-flex justify-content-center">
                    <img class="col-4 img-fluid img-thumbnail rounded-circle" src="{{ asset('storage/' . $user->image) }}"
                        alt="">
                </div>
                <div class="user">
                    <a href="">
                        <img src="" alt="">
                        <h5>{{ Auth::user()->name }}</h5>
                    </a>
                    <p>{{ $user->email }}</p>
                    {{-- {{ dd($user) }}} --}}
                    @foreach ($user->roles as $role)
                        <p> {{ $role->name }}</p>
                    @endforeach
                </div>
                <div class="card-description">
                    {{ $user->description }}
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <div class="button-container">
                    <button class="btn btn-icon btn-round bi-facebook"><i class="fab fa-facebook"></i></button>
                    <button class="btn btn-icon btn-round">
                        <i class="btn-icon bi-google"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-github">
                        <i class="bi bi-github"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
