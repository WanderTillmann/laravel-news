@extends('layouts.app')

@section('content')
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title m-0">{{ __('Cargos') }}</h4>
                    </div>
                    <div class="col-6 d-flex justify-content-end text-right">
                        <button type="button" class="float-right btn btn-link text-dark btn-sm" data-bs-toggle="modal"
                            data-bs-target="#searchModal">
                            <i class="bi bi-search"></i>
                        </button>
                        <a href="{{ route('role.create') }}"
                            class="btn btn-sm btn-primary float-right me-2">{{ __('Add Cargos') }}</a>
                        <a class="btn btn-primary btn-sm" href="{{ url('/') }}">Voltar</a>
                    </div>
                </div>
                <div class="modal modal-search fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal"
                    aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <form action="{{ route('role.search') }}" method="post"
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
                            <th scope="col">
                                Descrição
                            </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($roles as $role)
                            <tr>
                                <td class="align-middle">{{ $role->name }}</td>
                                <td class="align-middle">{{ $role->description }}</td>
                                {{-- <td class="align-middle">
                                    @foreach ($rolePermissions as $rolePermission)
                                        <a href="">{{ $rolePermission['name'] }}</a>
                                    @endforeach
                                </td> --}}
                                <td class="d-flex flex-row justify-content-end col ">
                                    <a href="{{ route('role.edit', $role->id) }}"
                                        class="btn btn-sm btn-primary me-2">Editar</a>
                                    <form action="{{ route('role.destroy', $role->id) }}" method="post">
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
                {{ $roles->appends($filters)->links() }}
            @else
                {{ $roles->links() }}
            @endif
        </div>
    </div>
@endsection
