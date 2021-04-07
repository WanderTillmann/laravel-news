@extends('layouts.app')

@section('content')
    <div class="col-8 " id="page-content-wrapper">
        <div class="card">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col-8">
                        <h4 class="card-title m-0">{{ __('Noticias') }}</h4>
                    </div>
                    <div class="col-4 d-flex justify-content-end text-right">
                        <button type="button" class="btn btn-link text-dark btn-sm" data-bs-toggle="modal"
                            data-bs-target="#searchModal">
                            <i class="bi bi-search"></i>
                        </button>
                        <div class=" text-right me-1">
                            <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">Add Noticia</a>
                        </div>
                        <a class="btn btn-primary btn-sm" href="{{ url('/') }}">Voltar</a>
                    </div>
                </div>
                <div class="modal modal-search fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal"
                    aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <form action="{{ route('post.search') }}" method="post"
                                    class="col-12 d-flex align-items-center justify-content-end">
                                    @csrf
                                    <input type="text" class="form-control col-9 row-cols-lg-auto " name="search"
                                        id="search" placeholder="Search">
                                    <button type="button" class="btn-close close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body row">
                <table class="table table-borderless list-unstyled col-12">
                    <thead class="text-center text-dark border-bottom ">
                        <tr class="align-middle">
                            <th scope="col">Nome</th>
                            <th scope="col" class="col-5">Descriçäo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class=" col-12">
                        @forelse ($posts as $post)
                            @can('view', $post)
                                <tr>
                                    <td class=" align-middle"><a
                                            href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                    </td>
                                    <td>
                                        <a href=" {{ route('post.show', $post->id) }}">
                                            <p class="col-5 text-truncate">{{ $post->content }}</p>
                                        </a>
                                    </td>
                                    <td class="d-flex flex-row justify-content-end col ">
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-sm btn-primary me-2">Editar</a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endcan
                        @empty
                            <tr>
                                <td>Sem postagens cadastradas no momento</td>
                            </tr>
                        @endforelse
                    </tbody>
            </div>
            </table>
        </div>
        @if (isset($filters))
            {{ $posts->appends($filters)->links() }}
        @else
            {{ $posts->links() }}
        @endif
    </div>
@endsection
