@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Editar Notícia</div>
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
