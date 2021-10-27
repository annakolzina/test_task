<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label text-md-righ">{{ __('Название') }}</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="title"  autofocus value="{{(!empty($document)) ? old('title', $document->title) : null}}">
    </div>
</div>
<div class="form-group owner">
    <label for="file">Загрузить документ</label>
    <input type="file" name="file">
</div>
<div class="form-group row">
    <label for="is_visible" class="col-md-3 col-form-label text-md-righ">Видимый</label><br/><br/>
    <input type="checkbox" class="mt-2" name="visible" @if(!empty($document) && $document->is_visible) checked @endif>
</div>
