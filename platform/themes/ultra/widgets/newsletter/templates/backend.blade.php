<div class="form-group">
    <label for="widget-name">{{ trans('core/base::forms.name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
    <br>
    <label for="widget-name">{{ trans('core/base::forms.description') }}</label>
    <textarea name="description" class="form-control">{{ $config['description'] }}</textarea>
</div>
