@extends('layouts.app')

@section('content')
    <div class="col-9 " id="page-content-wrapper">
        <div class="card">
            <div class="card-header">
                <div class="row d-flex align-items-center">
                    <div class="col-10">
                        <h4 class="card-title m-0">{{ __('Users') }}</h4>
                    </div>
                    <div class="col-2 d-flex justify-content-end text-right">
                        <button type="button" class="btn btn-link text-dark btn-sm" data-bs-toggle="modal"
                            data-bs-target="#searchModal">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-borderless list-unstyled">
                    <div class="table-responsive">
                        <thead class="text-center border-bottom text-dark ">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="align-middle">
                                        <a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('user.show', $user->id) }}">{{ $user->description }}</a>
                                    </td>
                                    <td class="align-middle">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge bg-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('user.show', $user->id) }}">{{ $user->email }}</a>
                                    </td>
                                    <td class="align-middle d-flex flex-row justify-content-end col">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="btn btn-sm  btn-primary me-2">Editar</a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="align-middle">Não Existem usuarios no banco</td>
                                </tr>
                            @endforelse
                        </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
