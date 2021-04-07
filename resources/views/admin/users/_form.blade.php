<form action="{{ route('user.update', $user->id) }}" method="post" class="g-2" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="mb-3 col-sm-5 ">
            <label for="name" class="form-label col-form-sm col-form-sm">Nome</label>
            <input type="name" name="name" class="form-control form-control-sm" id="name" aria-describedby="nameHelp"
                value="{{ $user->name }}">
        </div>

        <div class="form-group col-md">
            <label for="email" class="form-label col-form-sm">{{ __('Email') }}</label>
            <input type="email" class="form-control form-control-sm" id="email" name="email"
                aria-describedby="emailHelp" value="{{ $user->email }}">
        </div>
        <div class="mb-3 col-sm-12">
            <label for="formFile" class="form-label">Foto de Perfil</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="form-group col-12 mb-2">
            <label for="description">{{ __('Descrição') }}</label>
            <textarea class="form-control" id="description" name="description"
                rows="1">{{ $user->description }}</textarea>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="roles">{{ __('Cargo`s') }}</label>
            <select class="form-select" id="roles" name="roles" multiple size="1">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class=" btn btn-primary float-right">Editar</button>
    </div>
</form>
