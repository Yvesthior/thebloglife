<div class="form-group mb-3">
    <label class="control-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control"/>
</div>
<div class="form-group mb-3">
    <label class="control-label">{{ __('Limit') }}</label>
    <input type="number" name="limit" value="{{ Arr::get($attributes, 'limit', 8) }}" class="form-control"/>
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Sub title') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="Sub title">
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Background style') }}</label>
    {!! Form::select('background_style', get_background_styles(), Arr::get($attributes, 'background_style'), ['class' => 'form-control']) !!}
</div>
