@extends('layouts.app')

@section('content')
    <div class="col-md-6 m-0 mb-2">
        <div class="card">
            <div class="card-header">Editar Usuario</div>
            <div class="card-body">
                @include('admin.users._form')
            </div>
        </div>
    </div>
    <div class="col-md-6 " style="margin-left: 200px">
        <div class=" card ">
            <div class=" card-header">Alterar Senha</div>
            <div class="card-body">
                <form method="post" action="{{ route('user.updatePassword', $user->id) }}">
                    @csrf
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Alterar Senha') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
