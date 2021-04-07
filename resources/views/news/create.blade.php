@extends('layouts.app')
@section('content')

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Cadastrar Notícia</div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="post">
                    @csrf
                    @include('news._form')
                </form>
            </div>
        </div>
    </div>

@endsection
