<div class="col-md-8 mb-2">
    <label for="inputEmail4" class="form-label">{{ __('Nome do Cargo') }}</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $role->name ?? '' }}">
</div>
<div class="col-md-8 mb-2">
    <label for="inputEmail4" class="form-label">{{ __('Descrição do Cargo') }}</label>
    <input type="text" class="form-control" name="description" id="description"
        value="{{ $role->description ?? '' }}">
</div>
<div class="col-md-8">
    <label for="permission" class="form-label"> {{ __('Permissões do Cargo') }}</label>
    <div class="form-group  col-12">
        <select class="col-12" name="permission[]" id="permission" size='3' multiple>
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id ?? '' }}">{{ $permission->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-12 d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
</div>
