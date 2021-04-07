@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">Editar Notícia</div>
                    <div class="col-4 d-flex justify-content-end text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('post.index') }}">Voltar</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <form action="{{ route('post.update', $post->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    @include('news._form')
                </form>
            </div>
        </div>
    </div>
@endsection
