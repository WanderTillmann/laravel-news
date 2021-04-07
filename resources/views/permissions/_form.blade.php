<div class="col-md-8 mb-2">
    <label for="inputEmail4" class="form-label">{{ __('Nome da Permissão') }}</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $permission->name ?? '' }}">
</div>
<div class="col-md-8">
    <label for="inputEmail4" class="form-label">{{ __('Descrição') }}</label>
    <input type="text" class="form-control" name="description" id="description"
        value="{{ $permission->description ?? '' }}">
</div>
<div class="col-12 d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
</div>
