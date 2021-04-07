@extends('layouts.app')

@section('content')
    <div class=" col-8 ml-5  d-flex  flex-column justify-content-center ">
        @forelse ($posts as $post)
            @can('view', $post)
                <div class="post-preview">
                    <a href="{{ route('post.show', $post) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle text-truncate">
                            {{ $post->content }}
                        </h3>
                    </a>
                    <p class="post-meta">Postado por
                        <a href="#">{{ $post->user->name }}</a>

                        em {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                    </p>
                </div>
            @endcan
        @empty
            <div>
                <div class="post-body-title text-bold">Noticias</div>
                <div class="post-body-resumo align-bottom">
                    <p>Nenhuma noticia Publicada ainda</p>
                </div>
            </div>
        @endforelse
        <hr>
    @endsection
