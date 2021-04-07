<div class="col-md-8">
    <label for="inputEmail4" class="form-label">{{ __('titulo') }}</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ $post->title ?? '' }}">
</div>
<div class="col-md-8 mb-2">
    <label for="inputEmail4" class="form-label">{{ __('Descricao') }}</label>
    <input type="text" class="form-control" id="content" name="content" value="{{ $post->content ?? '' }}">
</div>
<div class="col-12 d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
</div>
