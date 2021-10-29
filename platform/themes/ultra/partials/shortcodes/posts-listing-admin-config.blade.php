<div class="form-group mb-3">
    <label class="control-label">{{ __('Limit') }}</label>
    <input type="number" name="limit" value="{{ Arr::get($attributes, 'limit') }}" class="form-control"/>
</div>

<div class="form-group mb-3">
    <label for="title_layout" class="control-label">{{ __('Layout') }}</label>
    {!! Form::customSelect('layout', get_category_layout(), Arr::get($attributes, 'layout'), ['class' => 'form-control', 'id' => 'layout']) !!}
</div>
