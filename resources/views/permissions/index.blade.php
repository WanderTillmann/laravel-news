@extends('layouts.app')

@section('content')
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col-8">
                        <h4 class="card-title m-0">{{ __('Permissões') }}</h4>
                    </div>
                    <div class="col-1 d-flex justify-content-end text-right">
                        <button type="button" class="btn btn-link text-dark btn-sm" data-bs-toggle="modal"
                            data-bs-target="#searchModal">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div class=" col-3 d-flex text-right justify-content-end">
                        <a href="{{ route('permission.create') }}"
                            class="btn btn-sm btn-primary ">{{ __('Add Permissão') }}</a>
                    </div>
                </div>
                <div class="modal modal-search fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal"
                    aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <form action="{{ route('permission.search') }}" method="post"
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
            <div class="card-body">
                <table class="table  table-borderless list-unstyled">
                    <thead class="text-center text-dark border-bottom ">
                        <tr class="align-middle">
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçäo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($permissions as $permission)
                            <tr>
                                <td class="align-middle">{{ $permission->name }}</td>
                                <td class="align-middle">{{ $permission->description }}</td>
                                <td class="d-flex flex-row justify-content-end col ">
                                    <a href="{{ route('permission.edit', $permission->id) }}"
                                        class="btn btn-sm btn-primary me-2">Editar</a>
                                    <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Sem postagens cadastradas no momento</td>
                            </tr>
                        @endforelse
                    </tbody>
            </div>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            @if (isset($filters))
                {{ $permissions->appends($filters)->links() }}
            @else
                {{ $permissions->links() }}
            @endif
        </div>

    </div>
@endsection
