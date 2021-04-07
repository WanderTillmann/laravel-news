@extends('layouts.app')

@section('content')
    <div class="col-md-6  ml-2 d-flex  justify-content-center">
        <div class="card col-12">
            <div class="card-header">Noticia</div>
            <div class="card-body">
                <div class="post-preview">
                    <a href="{{ route('post.show', $post) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->content }}
                        </h3>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
